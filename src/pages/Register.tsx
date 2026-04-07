import { useState } from "react";
import { useNavigate } from "react-router-dom";
import { UserPlus, CheckCircle } from "lucide-react";
import { BLOOD_TYPES, GOVERNORATES } from "@/lib/types";
import { addDonor } from "@/lib/donors";
import { useToast } from "@/hooks/use-toast";

const Register = () => {
  const navigate = useNavigate();
  const { toast } = useToast();
  const [form, setForm] = useState({
    name: "",
    phone: "",
    bloodType: "",
    governorate: "",
    center: "",
    village: "",
    age: "",
    lastDonation: "",
  });

  const centers = form.governorate ? GOVERNORATES[form.governorate] || [] : [];

  const handleChange = (e: React.ChangeEvent<HTMLInputElement | HTMLSelectElement>) => {
    const { name, value } = e.target;
    setForm((prev) => {
      if (name === "governorate") return { ...prev, governorate: value, center: "" };
      return { ...prev, [name]: value };
    });
  };

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    if (!form.name || !form.phone || !form.bloodType || !form.governorate) {
      toast({ title: "خطأ", description: "يرجى ملء جميع الحقول المطلوبة", variant: "destructive" });
      return;
    }
    addDonor({ ...form, age: Number(form.age) });
    toast({ title: "تم التسجيل بنجاح! ✓", description: "شكراً لك على تبرعك بالدم" });
    navigate("/");
  };

  const inputClass =
    "w-full px-4 py-3 rounded-xl border border-input bg-card text-foreground focus:outline-none focus:ring-2 focus:ring-ring transition-all";
  const labelClass = "block text-sm font-semibold text-foreground mb-2";

  return (
    <div className="min-h-screen py-12">
      <div className="container mx-auto px-4 max-w-2xl">
        <div className="text-center mb-10 animate-fade-in">
          <div className="w-16 h-16 gradient-primary rounded-2xl flex items-center justify-center mx-auto mb-4">
            <UserPlus className="text-primary-foreground" size={28} />
          </div>
          <h1 className="text-3xl font-bold text-foreground">تسجيل متبرع جديد</h1>
          <p className="text-muted-foreground mt-2">أدخل بياناتك لتكون جزءاً من مجتمع المنقذين</p>
        </div>

        <form onSubmit={handleSubmit} className="bg-card rounded-2xl shadow-card p-8 space-y-5 animate-fade-in" style={{ animationDelay: "0.1s" }}>
          <div className="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
              <label className={labelClass}>الاسم الكامل *</label>
              <input name="name" value={form.name} onChange={handleChange} className={inputClass} placeholder="أدخل اسمك الكامل" />
            </div>
            <div>
              <label className={labelClass}>رقم الهاتف *</label>
              <input name="phone" value={form.phone} onChange={handleChange} className={inputClass} placeholder="01xxxxxxxxx" type="tel" />
            </div>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
              <label className={labelClass}>فصيلة الدم *</label>
              <select name="bloodType" value={form.bloodType} onChange={handleChange} className={inputClass}>
                <option value="">اختر فصيلة الدم</option>
                {BLOOD_TYPES.map((bt) => (
                  <option key={bt} value={bt}>{bt}</option>
                ))}
              </select>
            </div>
            <div>
              <label className={labelClass}>العمر</label>
              <input name="age" value={form.age} onChange={handleChange} className={inputClass} placeholder="العمر" type="number" min={18} max={65} />
            </div>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
              <label className={labelClass}>المحافظة *</label>
              <select name="governorate" value={form.governorate} onChange={handleChange} className={inputClass}>
                <option value="">اختر المحافظة</option>
                {Object.keys(GOVERNORATES).map((g) => (
                  <option key={g} value={g}>{g}</option>
                ))}
              </select>
            </div>
            <div>
              <label className={labelClass}>المركز / المدينة</label>
              <select name="center" value={form.center} onChange={handleChange} className={inputClass} disabled={!form.governorate}>
                <option value="">اختر المركز</option>
                {centers.map((c) => (
                  <option key={c} value={c}>{c}</option>
                ))}
              </select>
            </div>
          </div>

          <div>
            <label className={labelClass}>القرية / المنطقة</label>
            <input name="village" value={form.village} onChange={handleChange} className={inputClass} placeholder="اسم القرية أو المنطقة" />
          </div>

          <div>
            <label className={labelClass}>آخر تاريخ تبرع</label>
            <input name="lastDonation" value={form.lastDonation} onChange={handleChange} className={inputClass} type="date" />
          </div>

          <button
            type="submit"
            className="w-full gradient-primary text-primary-foreground py-4 rounded-xl font-bold text-lg hover:shadow-card-hover transition-all hover:scale-[1.01] flex items-center justify-center gap-2"
          >
            <CheckCircle size={20} />
            تسجيل المتبرع
          </button>
        </form>
      </div>
    </div>
  );
};

export default Register;
