import { Heart } from "lucide-react";

const Footer = () => (
  <footer className="gradient-primary text-primary-foreground mt-auto">
    <div className="container mx-auto px-4 py-8">
      <div className="grid grid-cols-1 md:grid-cols-3 gap-8 text-center md:text-right">
        <div>
          <h3 className="text-lg font-bold mb-3">بنك الدم</h3>
          <p className="text-sm opacity-80">
            منصة إلكترونية تربط بين المتبرعين والباحثين عن الدم لإنقاذ الأرواح.
          </p>
        </div>
        <div>
          <h3 className="text-lg font-bold mb-3">روابط سريعة</h3>
          <ul className="space-y-2 text-sm opacity-80">
            <li>الرئيسية</li>
            <li>تسجيل متبرع</li>
            <li>البحث عن متبرع</li>
          </ul>
        </div>
        <div>
          <h3 className="text-lg font-bold mb-3">تواصل معنا</h3>
          <p className="text-sm opacity-80">info@bloodbank.com</p>
          <p className="text-sm opacity-80">01000000000</p>
        </div>
      </div>
      <div className="border-t border-primary-foreground/20 mt-6 pt-4 text-center text-sm opacity-70 flex items-center justify-center gap-1">
        صنع بـ <Heart size={14} className="fill-current" /> لإنقاذ الأرواح
      </div>
    </div>
  </footer>
);

export default Footer;
