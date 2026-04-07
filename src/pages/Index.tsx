import { Link } from "react-router-dom";
import { Droplets, Search, UserPlus, Heart, Users, Clock } from "lucide-react";
import heroImg from "@/assets/hero-blood.jpg";

const stats = [
  { icon: Users, label: "متبرع مسجل", value: "١٠٠٠+" },
  { icon: Droplets, label: "فصيلة دم", value: "٨" },
  { icon: Clock, label: "متاح ٢٤/٧", value: "دائماً" },
];

const Index = () => {
  return (
    <div className="min-h-screen flex flex-col">
      {/* Hero */}
      <section className="relative min-h-[80vh] flex items-center overflow-hidden">
        <div className="absolute inset-0">
          <img src={heroImg} alt="تبرع بالدم" className="w-full h-full object-cover" width={1920} height={1080} />
          <div className="absolute inset-0 bg-gradient-to-l from-foreground/90 to-foreground/60" />
        </div>
        <div className="container mx-auto px-4 relative z-10">
          <div className="max-w-2xl animate-fade-in">
            <div className="inline-flex items-center gap-2 bg-primary/20 backdrop-blur-sm text-primary-foreground px-4 py-2 rounded-full text-sm mb-6 border border-primary-foreground/20">
              <Droplets size={16} />
              <span>منصة بنك الدم الإلكترونية</span>
            </div>
            <h1 className="text-4xl md:text-6xl font-bold text-primary-foreground mb-6 leading-tight">
              تبرعك بالدم
              <br />
              <span className="text-accent">ينقذ حياة</span>
            </h1>
            <p className="text-lg text-primary-foreground/80 mb-8 max-w-lg">
              سجّل كمتبرع أو ابحث عن متبرع بفصيلة الدم المطلوبة في منطقتك. كل قطرة دم تصنع فرقاً.
            </p>
            <div className="flex flex-wrap gap-4">
              <Link
                to="/register"
                className="gradient-primary text-primary-foreground px-8 py-3 rounded-xl font-semibold text-lg shadow-card hover:shadow-card-hover transition-all hover:scale-105 flex items-center gap-2"
              >
                <UserPlus size={20} />
                سجّل كمتبرع
              </Link>
              <Link
                to="/search"
                className="bg-primary-foreground/10 backdrop-blur-sm text-primary-foreground border border-primary-foreground/30 px-8 py-3 rounded-xl font-semibold text-lg hover:bg-primary-foreground/20 transition-all flex items-center gap-2"
              >
                <Search size={20} />
                ابحث عن متبرع
              </Link>
            </div>
          </div>
        </div>
      </section>

      {/* Stats */}
      <section className="py-12 -mt-16 relative z-20">
        <div className="container mx-auto px-4">
          <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
            {stats.map((stat) => (
              <div
                key={stat.label}
                className="bg-card rounded-2xl p-6 shadow-card text-center hover:shadow-card-hover transition-all"
              >
                <stat.icon className="mx-auto text-primary mb-3" size={36} />
                <div className="text-3xl font-bold text-foreground">{stat.value}</div>
                <div className="text-muted-foreground text-sm mt-1">{stat.label}</div>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* How it works */}
      <section className="py-20 bg-muted/50">
        <div className="container mx-auto px-4 text-center">
          <h2 className="text-3xl font-bold text-foreground mb-2">كيف يعمل الموقع؟</h2>
          <p className="text-muted-foreground mb-12">خطوات بسيطة لإنقاذ حياة</p>
          <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
            {[
              { icon: UserPlus, title: "سجّل حسابك", desc: "أنشئ حسابك وأدخل بياناتك الأساسية وفصيلة دمك" },
              { icon: Search, title: "ابحث عن متبرع", desc: "ابحث بالفصيلة أو المنطقة للعثور على أقرب متبرع" },
              { icon: Heart, title: "أنقذ حياة", desc: "تواصل مع المتبرع واحصل على الدم الذي تحتاجه" },
            ].map((step, i) => (
              <div key={i} className="bg-card rounded-2xl p-8 shadow-card hover:shadow-card-hover transition-all group">
                <div className="w-16 h-16 gradient-primary rounded-2xl flex items-center justify-center mx-auto mb-5 group-hover:animate-pulse-blood">
                  <step.icon className="text-primary-foreground" size={28} />
                </div>
                <h3 className="text-xl font-bold text-foreground mb-3">{step.title}</h3>
                <p className="text-muted-foreground text-sm">{step.desc}</p>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* CTA */}
      <section className="py-20">
        <div className="container mx-auto px-4 text-center">
          <div className="gradient-primary rounded-3xl p-12 max-w-3xl mx-auto">
            <Droplets className="mx-auto text-primary-foreground mb-4 animate-pulse-blood" size={48} />
            <h2 className="text-3xl font-bold text-primary-foreground mb-4">
              كن بطلاً اليوم
            </h2>
            <p className="text-primary-foreground/80 mb-8 max-w-md mx-auto">
              تبرعك بالدم يمكن أن ينقذ حتى ٣ أرواح. سجّل الآن وكن جزءاً من مجتمع المنقذين.
            </p>
            <Link
              to="/register"
              className="inline-flex items-center gap-2 bg-primary-foreground text-primary px-8 py-3 rounded-xl font-semibold text-lg hover:bg-primary-foreground/90 transition-all"
            >
              <UserPlus size={20} />
              سجّل الآن
            </Link>
          </div>
        </div>
      </section>
    </div>
  );
};

export default Index;
