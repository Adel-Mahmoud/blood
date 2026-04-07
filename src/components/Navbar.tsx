import { Link, useLocation } from "react-router-dom";
import { useState } from "react";
import { Menu, X, Droplets } from "lucide-react";
import logoImg from "@/assets/logo.png";

const Navbar = () => {
  const [open, setOpen] = useState(false);
  const location = useLocation();

  const links = [
    { to: "/", label: "الرئيسية" },
    { to: "/register", label: "تسجيل متبرع" },
    { to: "/search", label: "البحث عن متبرع" },
    { to: "/about", label: "من نحن" },
  ];

  const isActive = (path: string) => location.pathname === path;

  return (
    <nav className="sticky top-0 z-50 bg-card/95 backdrop-blur-md border-b border-border shadow-sm">
      <div className="container mx-auto px-4">
        <div className="flex items-center justify-between h-16">
          <Link to="/" className="flex items-center gap-2">
            <img src={logoImg} alt="بنك الدم" width={36} height={36} />
            <span className="text-xl font-bold text-gradient">بنك الدم</span>
          </Link>

          {/* Desktop */}
          <div className="hidden md:flex items-center gap-1">
            {links.map((link) => (
              <Link
                key={link.to}
                to={link.to}
                className={`px-4 py-2 rounded-lg text-sm font-medium transition-colors ${
                  isActive(link.to)
                    ? "gradient-primary text-primary-foreground"
                    : "text-foreground hover:bg-accent"
                }`}
              >
                {link.label}
              </Link>
            ))}
          </div>

          {/* Mobile toggle */}
          <button
            onClick={() => setOpen(!open)}
            className="md:hidden p-2 rounded-lg hover:bg-accent"
          >
            {open ? <X size={24} /> : <Menu size={24} />}
          </button>
        </div>

        {/* Mobile menu */}
        {open && (
          <div className="md:hidden pb-4 space-y-1 animate-fade-in">
            {links.map((link) => (
              <Link
                key={link.to}
                to={link.to}
                onClick={() => setOpen(false)}
                className={`block px-4 py-3 rounded-lg text-sm font-medium transition-colors ${
                  isActive(link.to)
                    ? "gradient-primary text-primary-foreground"
                    : "text-foreground hover:bg-accent"
                }`}
              >
                {link.label}
              </Link>
            ))}
          </div>
        )}
      </div>
    </nav>
  );
};

export default Navbar;
