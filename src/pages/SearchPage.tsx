import { useState } from "react";
import { Search, Droplets, MapPin, Phone, User } from "lucide-react";
import { BLOOD_TYPES, GOVERNORATES, Donor } from "@/lib/types";
// import { searchDonors } from "@/lib/donors";
import { db } from "@/lib/firebase";
import { collection, getDocs, query, where } from "firebase/firestore";

const SearchPage = () => {
  const [filters, setFilters] = useState({ bloodType: "", governorate: "", center: "" });
  const [results, setResults] = useState<Donor[]>([]);
  const [searched, setSearched] = useState(false);

  const centers = filters.governorate ? GOVERNORATES[filters.governorate] || [] : [];

  const handleChange = (e: React.ChangeEvent<HTMLSelectElement>) => {
    const { name, value } = e.target;
    setFilters((prev) => {
      if (name === "governorate") return { ...prev, governorate: value, center: "" };
      return { ...prev, [name]: value };
    });
  };

  // const handleSearch = (e: React.FormEvent) => {
  //   e.preventDefault();
  //   setResults(searchDonors(filters));
  //   setSearched(true);
  // };
  const [loading, setLoading] = useState(false);
  const handleSearch = async (e: React.FormEvent) => {
    e.preventDefault();
  
    setLoading(true);
    setSearched(true);
  
    try {
      let q = query(collection(db, "donors"));
  
      if (filters.bloodType) {
        q = query(q, where("bloodType", "==", filters.bloodType));
      }
  
      if (filters.governorate) {
        q = query(q, where("governorate", "==", filters.governorate));
      }
  
      if (filters.center) {
        q = query(q, where("center", "==", filters.center));
      }
  
      const querySnapshot = await getDocs(q);
  
      const data: Donor[] = querySnapshot.docs.map((doc) => ({
        id: doc.id,
        ...doc.data(),
      })) as Donor[];
  
      setResults(data);
    } catch (error) {
      console.error("Error fetching donors:", error);
    } finally {
      setLoading(false);
    }
  };

  const inputClass =
    "w-full px-4 py-3 rounded-xl border border-input bg-card text-foreground focus:outline-none focus:ring-2 focus:ring-ring transition-all";

  return (
    <div className="min-h-screen py-12">
      <div className="container mx-auto px-4 max-w-4xl">
        <div className="text-center mb-10 animate-fade-in">
          <div className="w-16 h-16 gradient-primary rounded-2xl flex items-center justify-center mx-auto mb-4">
            <Search className="text-primary-foreground" size={28} />
          </div>
          <h1 className="text-3xl font-bold text-foreground">البحث عن متبرع</h1>
          <p className="text-muted-foreground mt-2">ابحث بفصيلة الدم أو المنطقة للعثور على أقرب متبرع</p>
        </div>

        <form onSubmit={handleSearch} className="bg-card rounded-2xl shadow-card p-8 mb-8 animate-fade-in" style={{ animationDelay: "0.1s" }}>
          <div className="grid grid-cols-1 md:grid-cols-3 gap-5">
            <div>
              <label className="block text-sm font-semibold text-foreground mb-2">فصيلة الدم</label>
              <select name="bloodType" value={filters.bloodType} onChange={handleChange} className={inputClass}>
                <option value="">جميع الفصائل</option>
                {BLOOD_TYPES.map((bt) => (
                  <option key={bt} value={bt}>{bt}</option>
                ))}
              </select>
            </div>
            <div>
              <label className="block text-sm font-semibold text-foreground mb-2">المحافظة</label>
              <select name="governorate" value={filters.governorate} onChange={handleChange} className={inputClass}>
                <option value="">جميع المحافظات</option>
                {Object.keys(GOVERNORATES).map((g) => (
                  <option key={g} value={g}>{g}</option>
                ))}
              </select>
            </div>
            <div>
              <label className="block text-sm font-semibold text-foreground mb-2">المركز</label>
              <select name="center" value={filters.center} onChange={handleChange} className={inputClass} disabled={!filters.governorate}>
                <option value="">جميع المراكز</option>
                {centers.map((c) => (
                  <option key={c} value={c}>{c}</option>
                ))}
              </select>
            </div>
          </div>
          <button
            type="submit"
            className="mt-6 w-full gradient-primary text-primary-foreground py-4 rounded-xl font-bold text-lg hover:shadow-card-hover transition-all hover:scale-[1.01] flex items-center justify-center gap-2"
          >
            <Search size={20} />
            بحث
          </button>
        </form>

        {/* Results */}
        {searched && (
        <div className="animate-fade-in">
          <h2 className="text-xl font-bold text-foreground mb-4">
            نتائج البحث ({loading ? "..." : results.length})
          </h2>

          {loading ? (
            <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
              {[1, 2].map((i) => (
                <div
                  key={i}
                  className="bg-card rounded-2xl shadow-card p-6 animate-pulse"
                >
                  <div className="flex items-center gap-3 mb-4">
                    <div className="w-12 h-12 bg-muted rounded-xl" />

                    <div className="flex-1 space-y-2">
                      <div className="h-4 bg-muted rounded w-1/2"></div>
                      <div className="h-3 bg-muted rounded w-2/3"></div>
                    </div>
                  </div>

                  <div className="h-3 bg-muted rounded w-3/4 mb-3"></div>
                  <div className="h-8 bg-muted rounded w-1/3"></div>
                </div>
              ))}
            </div>
          ) : results.length === 0 ? (
            <div className="bg-card rounded-2xl shadow-card p-12 text-center">
              <Droplets className="mx-auto text-muted-foreground mb-4" size={48} />
              <p className="text-muted-foreground text-lg">
                لا توجد نتائج مطابقة
              </p>
              <p className="text-muted-foreground text-sm mt-2">
                جرّب تغيير معايير البحث
              </p>
            </div>
          ) : (
            <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
              {results.map((donor) => (
                <div
                  key={donor.id}
                  className="bg-card rounded-2xl shadow-card p-6 hover:shadow-card-hover transition-all"
                >
                  <div className="flex items-start justify-between mb-4">
                    <div className="flex items-center gap-3">
                      <div className="w-12 h-12 gradient-primary rounded-xl flex items-center justify-center">
                        <span className="text-primary-foreground font-bold text-sm">
                          {donor.bloodType}
                        </span>
                      </div>

                      <div>
                        <h3 className="font-bold text-foreground flex items-center gap-1">
                          <User size={14} /> {donor.name}
                        </h3>
                        <p className="text-sm text-muted-foreground flex items-center gap-1">
                          <MapPin size={12} /> {donor.governorate} - {donor.center}
                        </p>
                      </div>
                    </div>
                  </div>

                  {donor.village && (
                    <p className="text-sm text-muted-foreground mb-2">
                      المنطقة: {donor.village}
                    </p>
                  )}

                  <a
                    href={`tel:${donor.phone}`}
                    className="inline-flex items-center gap-2 bg-accent text-accent-foreground px-4 py-2 rounded-lg text-sm font-medium hover:bg-accent/80 transition-colors"
                  >
                    <Phone size={14} />
                    {donor.phone}
                  </a>
                </div>
              ))}
            </div>
          )}
        </div>
      )}
      </div>
    </div>
  );
};

export default SearchPage;
