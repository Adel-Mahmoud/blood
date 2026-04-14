import { defineConfig } from "vite";
import react from "@vitejs/plugin-react-swc";
import path from "path";
import { componentTagger } from "lovable-tagger";
import { VitePWA } from "vite-plugin-pwa";

export default defineConfig(({ mode }) => ({
  base: "/blood/",
  server: {
    host: "::",
    port: 8080,
    hmr: {
      overlay: false,
    },
  },
  plugins: [
    react(),
    mode === "development" && componentTagger(),
    VitePWA({
      registerType: "autoUpdate",
      includeAssets: ["favicon.ico", "apple-touch-icon.png", "offline.html"],
      workbox: {
        globPatterns: [
          "**/*.{js,css,html,ico,png,svg,woff2,ttf}",
          "**/offline.html",
        ],
        globIgnores: ["**/node_modules/**", "**/sw.js"],
        navigateFallback: "/blood/offline.html",
        navigateFallbackDenylist: [
          /^\/api/,
          /^\/admin/,
          /\.(js|css|png|jpg|jpeg|svg|ico|json)$/,
        ],
        runtimeCaching: [
          {
            urlPattern: /^https:\/\/fonts\.googleapis\.com\/.*/i,
            handler: "CacheFirst",
            options: {
              cacheName: "google-fonts-cache",
              expiration: {
                maxEntries: 10,
                maxAgeSeconds: 60 * 60 * 24 * 365,
              },
            },
          },
          {
            urlPattern: /^https:\/\/fonts\.gstatic\.com\/.*/i,
            handler: "CacheFirst",
            options: {
              cacheName: "gstatic-fonts-cache",
              expiration: {
                maxEntries: 10,
                maxAgeSeconds: 60 * 60 * 24 * 365,
              },
            },
          },
        ],
      },
      manifest: {
        id: "/blood/",
        name: "بنك الدم",
        short_name: "بنك الدم",
        description: "منصة للتبرع بالدم في مصر",
        theme_color: "#e11d48",
        background_color: "#ffffff",
        display: "standalone",
        start_url: "/blood/",
        scope: "/blood/",
        icons: [
          {
            src: "/blood/icons/icon-192.png",
            sizes: "192x192",
            type: "image/png",
          },
          {
            src: "/blood/icons/icon-512.png",
            sizes: "512x512",
            type: "image/png",
          },
          {
            src: "/blood/icons/icon-512.png",
            sizes: "512x512",
            type: "image/png",
            purpose: "maskable",
          },
        ],
      },
      devOptions: {
        enabled: mode === "development",
        type: "module",
        navigateFallback: "/blood/offline.html",
      },
    }),
  ].filter(Boolean),
  resolve: {
    alias: {
      "@": path.resolve(__dirname, "./src"),
    },
    dedupe: [
      "react",
      "react-dom",
      "react/jsx-runtime",
      "react/jsx-dev-runtime",
      "@tanstack/react-query",
      "@tanstack/query-core",
    ],
  },
}));