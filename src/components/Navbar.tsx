import { Link, useLocation } from "react-router-dom";
import { useState, useEffect, useRef } from "react";
import { Menu, X } from "lucide-react";
import logoImg from "@/assets/logo.png";
import { signInWithGoogle, logout, auth } from "../lib/firebase";
import { onAuthStateChanged, User } from "firebase/auth";

const Navbar = () => {
  const [open, setOpen] = useState(false);
  const location = useLocation();
  const [user, setUser] = useState<User | null>(null);
  const [dropdownOpen, setDropdownOpen] = useState(false);
  const dropdownRef = useRef<HTMLDivElement>(null);

  useEffect(() => {
    const unsubscribe = onAuthStateChanged(auth, (currentUser) => {
      setUser(currentUser);
    });

    return () => unsubscribe();
  }, []);

  useEffect(() => {
    const handleClickOutside = (e: any) => {
      if (dropdownRef.current && !dropdownRef.current.contains(e.target)) {
        setDropdownOpen(false);
      }
    };

    document.addEventListener("mousedown", handleClickOutside);
    return () => document.removeEventListener("mousedown", handleClickOutside);
  }, []);

  const links = [
    { to: "/", label: "الرئيسية" },
    { to: "/search", label: "البحث عن متبرع" },
    { to: "/about", label: "من نحن" },
  ];

  if (!user) {
    links.splice(1, 0, { to: "/register", label: "تسجيل متبرع" });
  }

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
              <div className="relative ml-4" ref={dropdownRef}>
                <button
                  onClick={() => setDropdownOpen(!dropdownOpen)}
                  className="flex items-center gap-2 hover:bg-accent px-3 py-2 rounded-lg transition"
                >
                  <img
                    src={user.photoURL || ""}
                    alt="profile"
                    className="w-8 h-8 rounded-full"
                  />
                  <span className="text-sm font-medium">
                    {user.displayName}
                  </span>
                </button>

                {dropdownOpen && (
                  <div className="absolute right-0 mt-2 w-48 bg-card border border-border rounded-xl shadow-lg overflow-hidden animate-fade-in">
                    <Link
                      to="/edit-donor"
                      onClick={() => setDropdownOpen(false)}
                      className="block px-4 py-3 text-sm hover:bg-accent transition"
                    >
                      تعديل البيانات
                    </Link>

                    <button
                      onClick={logout}
                      className="w-full text-right px-4 py-3 text-sm text-red-600 hover:bg-red-50 transition"
                    >
                      تسجيل الخروج
                    </button>
                  </div>
                )}
              </div>
            ) : (
              <Link
                to="/register"
                className="ml-4 px-4 py-2 font-medium hover:opacity-90 transition"
              >
                تسجيل الدخول
              </Link>
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
              <div className="px-4 pt-2 space-y-2">
                <Link
                  to="/edit-donor"
                  onClick={() => setOpen(false)}
                  className="block px-4 py-2 rounded-lg hover:bg-accent"
                >
                  تعديل البيانات
                </Link>

                <button
                  onClick={logout}
                  className="w-full px-4 py-2 gradient-primary text-white rounded-lg"
                >
                  تسجيل الخروج
                </button>
              </div>
            ) : (
              <button
                onClick={signInWithGoogle}
                className="w-full px-4 py-2 gradient-primary text-white rounded-lg font-medium"
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