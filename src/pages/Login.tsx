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
        className="px-6 py-3 bg-red-600 text-white rounded-lg disabled:opacity-50"
      >
        {loading ? "جاري تسجيل الدخول..." : "تسجيل الدخول بحساب جوجل"}
      </button>
    </div>
  );
};

export default Login;