import { useEffect, useState } from "react";
import { useNavigate } from "react-router-dom";
import { UserPlus, CheckCircle } from "lucide-react";
import { BLOOD_TYPES, GOVERNORATES } from "@/lib/types";
import { getMyDonor, addDonor, deleteDonor } from "@/lib/donors";

const EditDonor = () => {
  const navigate = useNavigate();

  const [loading, setLoading] = useState(false);
  const [initialLoading, setInitialLoading] = useState(true);

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

  useEffect(() => {
    const loadData = async () => {
      const donor = await getMyDonor();

      if (!donor) {
        navigate("/register", { replace: true });
        return;
      }

      setForm({
        name: donor.name || "",
        phone: donor.phone || "",
        bloodType: donor.bloodType || "",
        governorate: donor.governorate || "",
        center: donor.center || "",
        village: donor.village || "",
        age: donor.age ? String(donor.age) : "",
        lastDonation: donor.lastDonation || "",
      });

      setInitialLoading(false);
    };

    loadData();
  }, []);

  const centers = form.governorate ? GOVERNORATES[form.governorate] || [] : [];

  const handleChange = (e: React.ChangeEvent<HTMLInputElement | HTMLSelectElement>) => {
    const { name, value } = e.target;

    setForm((prev) => {
      if (name === "governorate") {
        return { ...prev, governorate: value, center: "" };
      }
      return { ...prev, [name]: value };
    });
  };

  const handleUpdate = async (e: React.FormEvent) => {
    e.preventDefault();

    if (!form.name || !form.phone || !form.bloodType || !form.governorate) {
      return;
    }

    setLoading(true);

    try {
      await addDonor({
        ...form,
        age: form.age ? Number(form.age) : null,
      });

      navigate("/");
    } finally {
      setLoading(false);
    }
  };

  const handleDelete = async () => {
    if (!confirm("هل أنت متأكد من حذف بياناتك؟")) return;

    setLoading(true);

    try {
      await deleteDonor();
      navigate("/", { replace: true });
    } finally {
      setLoading(false);
    }
  };

  const inputClass =
    "w-full px-4 py-3 rounded-xl border border-input bg-card text-foreground focus:outline-none focus:ring-2 focus:ring-ring transition-all";

  const labelClass = "block text-sm font-semibold text-foreground mb-2";

  if (initialLoading) {
    return (
      <div className="min-h-screen flex items-center justify-center">
        <div className="flex flex-col items-center gap-3">
          <div className="w-10 h-10 border-4 border-primary border-t-transparent rounded-full animate-spin"></div>
          <p className="text-muted-foreground">جاري تحميل البيانات...</p>
        </div>
      </div>
    );
  }

  return (
    <div className="min-h-screen py-12">
      <div className="container mx-auto px-4 max-w-2xl">
        <div className="text-center mb-10 animate-fade-in">
          <div className="w-16 h-16 gradient-primary rounded-2xl flex items-center justify-center mx-auto mb-4">
            <UserPlus className="text-primary-foreground" size={28} />
          </div>

          <h1 className="text-3xl font-bold text-foreground">
            تعديل بيانات المتبرع
          </h1>

          <p className="text-muted-foreground mt-2">
            يمكنك تحديث بياناتك أو حذفها في أي وقت
          </p>
        </div>

        <form
          onSubmit={handleUpdate}
          className="bg-card rounded-2xl shadow-card p-8 space-y-5 animate-fade-in"
        >
          <div className="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
              <label className={labelClass}>الاسم الكامل *</label>
              <input name="name" value={form.name} onChange={handleChange} className={inputClass} />
            </div>

            <div>
              <label className={labelClass}>رقم الهاتف *</label>
              <input name="phone" value={form.phone} onChange={handleChange} className={inputClass} />
            </div>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
              <label className={labelClass}>فصيلة الدم *</label>
              <select name="bloodType" value={form.bloodType} onChange={handleChange} className={inputClass}>
                <option value="">اختر فصيلة الدم</option>
                {BLOOD_TYPES.map((bt) => (
                  <option key={bt} value={bt}>
                    {bt}
                  </option>
                ))}
              </select>
            </div>

            <div>
              <label className={labelClass}>العمر</label>
              <input name="age" value={form.age} onChange={handleChange} className={inputClass} />
            </div>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
              <label className={labelClass}>المحافظة *</label>
              <select name="governorate" value={form.governorate} onChange={handleChange} className={inputClass}>
                <option value="">اختر المحافظة</option>
                {Object.keys(GOVERNORATES).map((g) => (
                  <option key={g} value={g}>
                    {g}
                  </option>
                ))}
              </select>
            </div>

            <div>
              <label className={labelClass}>المركز / المدينة</label>
              <select
                name="center"
                value={form.center}
                onChange={handleChange}
                className={inputClass}
                disabled={!form.governorate}
              >
                <option value="">اختر المركز</option>
                {centers.map((c) => (
                  <option key={c} value={c}>
                    {c}
                  </option>
                ))}
              </select>
            </div>
          </div>

          <div>
            <label className={labelClass}>القرية / المنطقة</label>
            <input name="village" value={form.village} onChange={handleChange} className={inputClass} />
          </div>

          <div>
            <label className={labelClass}>آخر تاريخ تبرع</label>
            <input type="date" name="lastDonation" value={form.lastDonation} onChange={handleChange} className={inputClass} />
          </div>

          <button
            type="submit"
            disabled={loading}
            className="w-full gradient-primary text-primary-foreground py-4 rounded-xl font-bold"
          >
            {loading ? "جاري التحديث..." : "تحديث البيانات"}
          </button>

          <button
            type="button"
            onClick={handleDelete}
            disabled={loading}
            className="w-full bg-red-600 text-white py-3 rounded-xl font-bold"
          >
            حذف الحساب
          </button>
        </form>
      </div>
    </div>
  );
};

export default EditDonor;