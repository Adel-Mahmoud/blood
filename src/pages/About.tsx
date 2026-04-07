import { Heart, Shield, Users, Zap } from "lucide-react";

const features = [
  { icon: Heart, title: "إنقاذ الأرواح", desc: "نربط بين المتبرعين والمحتاجين لإنقاذ حياة الناس" },
  { icon: Shield, title: "بيانات آمنة", desc: "نحافظ على خصوصية بيانات المتبرعين والمستخدمين" },
  { icon: Users, title: "مجتمع كبير", desc: "شبكة واسعة من المتبرعين في جميع المحافظات" },
  { icon: Zap, title: "بحث سريع", desc: "ابحث واعثر على المتبرع المناسب في ثوانٍ" },
];

const About = () => (
  <div className="min-h-screen py-12">
    <div className="container mx-auto px-4 max-w-3xl">
      <div className="text-center mb-12 animate-fade-in">
        <h1 className="text-3xl font-bold text-foreground mb-4">من نحن</h1>
        <p className="text-muted-foreground text-lg max-w-xl mx-auto">
          بنك الدم هو منصة إلكترونية مجانية تهدف إلى تسهيل عملية البحث عن متبرعين بالدم
          وربطهم بالمحتاجين في جميع أنحاء مصر.
        </p>
      </div>

      <div className="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
        {features.map((f, i) => (
          <div
            key={i}
            className="bg-card rounded-2xl shadow-card p-6 hover:shadow-card-hover transition-all animate-fade-in"
            style={{ animationDelay: `${i * 0.1}s` }}
          >
            <div className="w-12 h-12 gradient-primary rounded-xl flex items-center justify-center mb-4">
              <f.icon className="text-primary-foreground" size={22} />
            </div>
            <h3 className="text-lg font-bold text-foreground mb-2">{f.title}</h3>
            <p className="text-muted-foreground text-sm">{f.desc}</p>
          </div>
        ))}
      </div>

      <div className="bg-accent rounded-2xl p-8 text-center animate-fade-in">
        <h2 className="text-xl font-bold text-foreground mb-3">رسالتنا</h2>
        <p className="text-muted-foreground">
          نسعى لبناء مجتمع متكامل من المتبرعين بالدم يمكن الوصول إليهم بسهولة في أي وقت وأي مكان.
          نؤمن أن كل قطرة دم يمكن أن تصنع فرقاً وتنقذ حياة إنسان.
        </p>
      </div>
    </div>
  </div>
);

export default About;
