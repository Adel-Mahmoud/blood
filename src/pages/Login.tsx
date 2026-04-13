import { useState } from "react";
import { signInWithGoogle } from "@/lib/firebase";
import { useNavigate, useLocation } from "react-router-dom";

const Login = () => {
  const navigate = useNavigate();
  const location = useLocation();

  const from = location.state?.from?.pathname || "/";

  const [loading, setLoading] = useState(false);

  const handleLogin = async () => {
    setLoading(true);
    try {
      await signInWithGoogle();
      navigate(from);
    } catch (error) {
      console.error("Login Error:", error);
    } finally {
      setLoading(false);
    }
  };

  return (
    <div className="flex items-center justify-center min-h-screen">
      <button
        onClick={handleLogin}
        disabled={loading}
        className="flex items-center gap-3 px-6 py-3 gradient-primary text-white rounded-lg shadow-md hover:bg-red-600 transition-all disabled:opacity-50"
      >
        {loading ? "جاري تسجيل الدخول..." : "تسجيل الدخول بحساب جوجل"}
        <svg className="w-5 h-5" viewBox="0 0 48 48">
          <path fill="#EA4335" d="M24 9.5c3.54 0 6.72 1.22 9.22 3.6l6.9-6.9C35.78 2.22 30.26 0 24 0 14.62 0 6.51 5.48 2.56 13.44l8.03 6.23C12.52 13.07 17.77 9.5 24 9.5z"/>
          <path fill="#4285F4" d="M46.5 24.5c0-1.63-.15-3.2-.42-4.7H24v9h12.7c-.55 2.96-2.2 5.48-4.7 7.17l7.27 5.65C43.9 37.5 46.5 31.5 46.5 24.5z"/>
          <path fill="#FBBC05" d="M10.59 28.67a14.49 14.49 0 010-9.34l-8.03-6.23A24 24 0 000 24c0 3.88.93 7.55 2.56 10.9l8.03-6.23z"/>
          <path fill="#34A853" d="M24 48c6.48 0 11.93-2.14 15.91-5.82l-7.27-5.65c-2.02 1.36-4.6 2.17-8.64 2.17-6.23 0-11.48-3.57-13.41-8.67l-8.03 6.23C6.51 42.52 14.62 48 24 48z"/>
        </svg>
      </button>
    </div>
  );
};

export default Login;