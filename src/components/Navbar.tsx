import { Link, useLocation } from "react-router-dom";
import { useState, useEffect } from "react";
import { Menu, X } from "lucide-react";
import logoImg from "@/assets/logo.png";
import { signInWithGoogle, logout, auth } from "../lib/firebase";
import { onAuthStateChanged, User } from "firebase/auth";

const Navbar = () => {
  const [open, setOpen] = useState(false);
  const location = useLocation();
  const [user, setUser] = useState<User | null>(null);

  useEffect(() => {
    const unsubscribe = onAuthStateChanged(auth, (currentUser) => {
      setUser(currentUser);
    });

    return () => unsubscribe();
  }, []);

  const links = [
    { to: "/", label: "الرئيسية" },
    { to: "/register", label: "تسجيل متبرع" },
    { to: "/search", label: "البحث عن متبرع" },
    { to: "/about", label: "من نحن" },
  ];

  const isActive = (path) => location.pathname === path;

  return (
    <nav className="sticky top-0 z-50 bg-card/95 backdrop-blur-md border-b border-border shadow-sm">
      <div className="container mx-auto px-4">
        <div className="flex items-center justify-between h-16">
          
          <Link to="/" className="flex items-center gap-2">
            <img src={logoImg} alt="بنك الدم" width={36} height={36} />
            <span className="text-xl font-bold text-gradient">بنك الدم</span>
          </Link>

          {/* Desktop */}
          <div className="hidden md:flex items-center gap-2">
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

            {user ? (
              <div className="flex items-center gap-2 ml-4">
                <img
                  src={user.photoURL || ""}
                  alt="profile"
                  className="w-8 h-8 rounded-full"
                />
                <span className="text-sm">{user.displayName}</span>
                <button
                  onClick={logout}
                  className="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700"
                >
                  خروج
                </button>
              </div>
            ) : (
              <button
                onClick={signInWithGoogle}
                className="ml-4 px-4 py-2 bg-white text-red-600 rounded-lg font-medium hover:bg-gray-100"
              >
                تسجيل الدخول
              </button>
            )}
          </div>

          {/* Mobile toggle */}
          <button
            onClick={() => setOpen(!open)}
            className="md:hidden p-2 rounded-lg hover:bg-accent"
          >
            {open ? <X size={24} /> : <Menu size={24} />}
          </button>
        </div>

        {/* Mobile */}
        {open && (
          <div className="md:hidden pb-4 space-y-2 animate-fade-in">
            {links.map((link) => (
              <Link
                key={link.to}
                to={link.to}
                onClick={() => setOpen(false)}
                className={`block px-4 py-3 rounded-lg text-sm font-medium ${
                  isActive(link.to)
                    ? "gradient-primary text-primary-foreground"
                    : "text-foreground hover:bg-accent"
                }`}
              >
                {link.label}
              </Link>
            ))}

            {user ? (
              <div className="flex items-center justify-between px-4 pt-2">
                <div className="flex items-center gap-2">
                  <img
                    src={user.photoURL || ""}
                    alt="profile"
                    className="w-8 h-8 rounded-full"
                  />
                  <span>{user.displayName}</span>
                </div>
                <button
                  onClick={logout}
                  className="px-3 py-1 bg-red-600 text-white rounded-md"
                >
                  خروج
                </button>
              </div>
            ) : (
              <button
                onClick={signInWithGoogle}
                className="w-full px-4 py-2 bg-white text-red-600 rounded-lg font-medium"
              >
                تسجيل الدخول بحساب جوجل
              </button>
            )}
          </div>
        )}
      </div>
    </nav>
  );
};

export default Navbar;