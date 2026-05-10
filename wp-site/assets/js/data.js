/* AboBakr — mock data */

window.SITE_DATA = {
  brand: {
    name: { ar: "أبوبكر", en: "AboBakr" },
    tagline: {
      ar: "خمسة تخصصات. صوت بصري واحد.",
      en: "Five disciplines. One visual voice."
    },
    location: { ar: "الرياض، السعودية", en: "Riyadh, KSA" },
    started: "2018",
  },

  hero: {
    states: [
      {
        id: "design",
        labelAr: "جرافيكس",
        labelEn: "Graphic Design",
        titleAr: "نحت",
        titleEn: "Sculpting",
        accentAr: "الفكرة",
        accentEn: "the idea",
        subAr: "هويات بصرية تحمل صوتاً، لا تكتفي بالظهور.",
        subEn: "Brand systems with a voice, not just a look.",
        cardLabel: "Adobe Suite · Identity",
        bgGrad: "linear-gradient(135deg, #1a1610, #0a0a0a 70%)",
        symbol: "Aa",
      },
      {
        id: "laser",
        labelAr: "ليزر",
        labelEn: "Laser",
        titleAr: "نحت",
        titleEn: "Cutting",
        accentAr: "الخامة",
        accentEn: "raw matter",
        subAr: "أكريليك، خشب، ودقة الميكرون.",
        subEn: "Acrylic, wood, micron precision.",
        cardLabel: "CO₂ · 1200×900mm",
        bgGrad: "linear-gradient(135deg, #14110a, #0a0a0a 70%)",
        symbol: "✦",
      },
      {
        id: "film",
        labelAr: "فيديو",
        labelEn: "Film",
        titleAr: "صناعة",
        titleEn: "Crafting",
        accentAr: "الحركة",
        accentEn: "the motion",
        subAr: "أفلام قصيرة، إعلانات، ولقطات لها بصمة.",
        subEn: "Short films, ads, and shots with a signature.",
        cardLabel: "RED · 4K · Premiere",
        bgGrad: "linear-gradient(135deg, #0e1414, #0a0a0a 70%)",
        symbol: "▶",
      },
      {
        id: "flora",
        labelAr: "زهور",
        labelEn: "Floral",
        titleAr: "تنسيق",
        titleEn: "Composing",
        accentAr: "اللون",
        accentEn: "with petals",
        subAr: "تنسيق زهور بحس فني، لكل مناسبة وذوق.",
        subEn: "Floral arrangement with editorial sensibility.",
        cardLabel: "Bouquet · Event · Editorial",
        bgGrad: "linear-gradient(135deg, #14100e, #0a0a0a 70%)",
        symbol: "❀",
      },
      {
        id: "photo",
        labelAr: "تصوير",
        labelEn: "Photography",
        titleAr: "التقاط",
        titleEn: "Capturing",
        accentAr: "الضوء",
        accentEn: "the light",
        subAr: "بورتريه، منتجات، وسرد بصري بالكاميرا.",
        subEn: "Portrait, product, narrative with a camera.",
        cardLabel: "Sony · Prime · Natural light",
        bgGrad: "linear-gradient(135deg, #0e0d0c, #0a0a0a 70%)",
        symbol: "◐",
      },
    ]
  },

  specialties: [
    { num: "01", icon: "Aa", titleAr: "تصميم جرافيكس", titleEn: "Graphic Design", descAr: "هويات • مطبوعات • مواد رقمية", descEn: "Identity · Print · Digital" },
    { num: "02", icon: "✦", titleAr: "قطع ليزر", titleEn: "Laser Cutting", descAr: "أكريليك • خشب • تخصيص", descEn: "Acrylic · Wood · Bespoke" },
    { num: "03", icon: "▶", titleAr: "إنتاج فيديو", titleEn: "Film Production", descAr: "أفلام • إعلانات • مونتاج", descEn: "Films · Ads · Editing" },
    { num: "04", icon: "❀", titleAr: "تنسيق زهور", titleEn: "Floral Design", descAr: "باقات • مناسبات • تحريرية", descEn: "Bouquets · Events · Editorial" },
    { num: "05", icon: "◐", titleAr: "تصوير فوتوغرافي", titleEn: "Photography", descAr: "بورتريه • منتج • سرد بصري", descEn: "Portrait · Product · Story" },
  ],

  marquee: [
    { ar: "هوية بصرية", en: "Brand Identity" },
    { ar: "تصميم طباعي", en: "Editorial Design" },
    { ar: "قطع أكريليك", en: "Acrylic Cuts" },
    { ar: "نحت خشبي", en: "Wood Engraving" },
    { ar: "أفلام قصيرة", en: "Short Films" },
    { ar: "إعلانات", en: "Commercials" },
    { ar: "تنسيق مناسبات", en: "Event Florals" },
    { ar: "تصوير منتجات", en: "Product Photography" },
    { ar: "تصوير بورتريه", en: "Portrait Photography" },
    { ar: "موشن جرافيك", en: "Motion Graphics" },
  ],

  filters: [
    { id: "all", labelAr: "الكل", labelEn: "All", count: 24 },
    { id: "design", labelAr: "جرافيكس", labelEn: "Design", count: 8 },
    { id: "laser", labelAr: "ليزر", labelEn: "Laser", count: 5 },
    { id: "film", labelAr: "فيديو", labelEn: "Film", count: 4 },
    { id: "flora", labelAr: "زهور", labelEn: "Floral", count: 3 },
    { id: "photo", labelAr: "تصوير", labelEn: "Photo", count: 4 },
  ],

  // Bento layout: 12-col grid, span_c (cols), span_r (rows)
  portfolio: [
    { id: "p01", titleAr: "هوية مقهى رواق", titleEn: "Rawaq Café Identity", cat: "design", catLabelAr: "هوية بصرية", catLabelEn: "Brand Identity", year: "2025", client: "Rawaq Coffee", isVideo: false, span_c: 6, span_r: 4, hue: 28, sat: 18, light: 22 },
    { id: "p02", titleAr: "ميدالية أكريليك مذهبة", titleEn: "Brass-laser Pendant", cat: "laser", catLabelAr: "نحت أكريليك", catLabelEn: "Acrylic Engraving", year: "2025", client: "Bayan Studio", isVideo: false, span_c: 3, span_r: 4, hue: 38, sat: 30, light: 18 },
    { id: "p03", titleAr: "إعلان رمضان 2025", titleEn: "Ramadan 2025 Spot", cat: "film", catLabelAr: "إعلان", catLabelEn: "Commercial", year: "2025", client: "Tamkeen", isVideo: true, span_c: 3, span_r: 6, hue: 200, sat: 12, light: 14 },
    { id: "p04", titleAr: "باقة شتوية تحريرية", titleEn: "Editorial Winter Bouquet", cat: "flora", catLabelAr: "تحريري", catLabelEn: "Editorial", year: "2024", client: "Vogue Arabia", isVideo: false, span_c: 4, span_r: 3, hue: 350, sat: 14, light: 18 },
    { id: "p05", titleAr: "كتاب طبخ نجود", titleEn: "Najoud Cookbook", cat: "design", catLabelAr: "كتاب طبخ", catLabelEn: "Cookbook", year: "2024", client: "Saudi Heritage", isVideo: false, span_c: 5, span_r: 3, hue: 18, sat: 22, light: 20 },
    { id: "p06", titleAr: "قطع خشبية للديكور", titleEn: "Wood Decor Pieces", cat: "laser", catLabelAr: "خشب محفور", catLabelEn: "Engraved Wood", year: "2024", client: "Home Series", isVideo: false, span_c: 3, span_r: 3, hue: 30, sat: 30, light: 16 },
    { id: "p07", titleAr: "بورتريه — سلسلة الحرفيين", titleEn: "Artisans Portrait Series", cat: "photo", catLabelAr: "بورتريه", catLabelEn: "Portrait", year: "2024", client: "Personal", isVideo: false, span_c: 4, span_r: 4, hue: 22, sat: 8, light: 14 },
    { id: "p08", titleAr: "فيلم قصير: أوراق", titleEn: "Short film: Leaves", cat: "film", catLabelAr: "فيلم قصير", catLabelEn: "Short Film", year: "2024", client: "Festival entry", isVideo: true, span_c: 5, span_r: 4, hue: 50, sat: 14, light: 12 },
    { id: "p09", titleAr: "تصوير منتجات عطور", titleEn: "Perfume Product Shots", cat: "photo", catLabelAr: "منتج", catLabelEn: "Product", year: "2024", client: "Oud House", isVideo: false, span_c: 3, span_r: 3, hue: 35, sat: 18, light: 20 },
  ],

  videoSection: [
    { id: "v01", titleAr: "إعلان رمضان", titleEn: "Ramadan ad", ratio: "16/9", duration: "0:45" },
    { id: "v02", titleAr: "ريل تنسيق زهور", titleEn: "Floral reel", ratio: "9/16", duration: "0:18" },
    { id: "v03", titleAr: "BTS كتاب الطبخ", titleEn: "Cookbook BTS", ratio: "16/9", duration: "1:20" },
    { id: "v04", titleAr: "قطع ليزر — تايملابس", titleEn: "Laser timelapse", ratio: "1/1", duration: "0:22" },
    { id: "v05", titleAr: "ديوان للقصيد", titleEn: "Poetry diwan", ratio: "9/16", duration: "0:40" },
    { id: "v06", titleAr: "إعلان عطر مساء", titleEn: "Perfume ad", ratio: "16/9", duration: "0:30" },
  ],

  gallery: [
    { id: "g01", w: 4, h: 5, source: "portfolio", titleAr: "كتاب نجود — غلاف", titleEn: "Najoud cover" },
    { id: "g02", w: 4, h: 3, source: "post", titleAr: "ورشة الليزر", titleEn: "Laser workshop" },
    { id: "g03", w: 1, h: 1, source: "product", titleAr: "ميدالية أكريليك", titleEn: "Acrylic pendant" },
    { id: "g04", w: 4, h: 5, source: "portfolio", titleAr: "بورتريه عبدالله", titleEn: "Abdullah portrait" },
    { id: "g05", w: 4, h: 3, source: "portfolio", titleAr: "إعلان مساء", titleEn: "Masaa ad" },
    { id: "g06", w: 4, h: 5, source: "portfolio", titleAr: "باقة الياسمين", titleEn: "Jasmine bouquet" },
    { id: "g07", w: 1, h: 1, source: "product", titleAr: "خشب محفور", titleEn: "Engraved wood" },
    { id: "g08", w: 4, h: 4, source: "post", titleAr: "ورشة بنات", titleEn: "Workshop" },
    { id: "g09", w: 4, h: 5, source: "portfolio", titleAr: "هوية رواق", titleEn: "Rawaq logo" },
    { id: "g10", w: 4, h: 3, source: "portfolio", titleAr: "أوراق فيلم", titleEn: "Leaves film" },
    { id: "g11", w: 4, h: 5, source: "post", titleAr: "نقاش تصميم", titleEn: "Design talk" },
    { id: "g12", w: 1, h: 1, source: "product", titleAr: "قطع زجاج", titleEn: "Glass pieces" },
    { id: "g13", w: 4, h: 4, source: "portfolio", titleAr: "تنسيق طاولة", titleEn: "Table setting" },
    { id: "g14", w: 4, h: 5, source: "portfolio", titleAr: "عطر العود", titleEn: "Oud perfume" },
    { id: "g15", w: 4, h: 3, source: "post", titleAr: "خلف الكواليس", titleEn: "Behind scenes" },
  ],

  shop: [
    { id: "s01", titleAr: "حقيبة قهوة مذهبة", titleEn: "Gold Coffee Pouch", cat: "ملحقات", type: "physical", price: 145, currency: "SAR" },
    { id: "s02", titleAr: "حزمة قوالب Adobe", titleEn: "Adobe Templates Pack", cat: "رقمي", type: "digital", price: 75, currency: "SAR" },
    { id: "s03", titleAr: "تصميم لوجو احترافي", titleEn: "Pro Logo Design", cat: "خدمات", type: "service", price: 1500, currency: "SAR" },
    { id: "s04", titleAr: "ميدالية ليزر مخصصة", titleEn: "Custom Laser Pendant", cat: "أكريليك", type: "physical", price: 95, currency: "SAR" },
    { id: "s05", titleAr: "حزمة LUTs سينمائية", titleEn: "Cinematic LUTs Pack", cat: "رقمي", type: "digital", price: 120, currency: "SAR" },
    { id: "s06", titleAr: "جلسة تصوير منتجات", titleEn: "Product Photo Session", cat: "خدمات", type: "service", price: 950, currency: "SAR" },
    { id: "s07", titleAr: "حزمة موكاب جاهزة", titleEn: "Premium Mockup Pack", cat: "رقمي", type: "digital", price: 60, currency: "SAR" },
    { id: "s08", titleAr: "لوحة خشب محفورة", titleEn: "Engraved Wood Panel", cat: "خشب", type: "physical", price: 220, currency: "SAR" },
  ],

  process: [
    { num: "01", titleAr: "اكتشاف", titleEn: "Discover", bodyAr: "نجلس، نسمع، ونفهم القصة قبل أن نرسم خطاً واحداً. الفكرة قبل الشكل، والمعنى قبل الجمال.", bodyEn: "We sit, we listen, we understand the story before drawing a line. Idea before form.", deliver: ["Brief", "Mood Board", "Strategy"] },
    { num: "02", titleAr: "تحديد الاتجاه", titleEn: "Direction", bodyAr: "نحدد اللغة البصرية: الألوان، الخطوط، الإيقاع. ونتفق على الاتجاه قبل تنفيذ التفاصيل.", bodyEn: "We define the visual language: color, type, rhythm. Direction is locked before details.", deliver: ["Style Frame", "Color System", "Type"] },
    { num: "03", titleAr: "الإنتاج", titleEn: "Production", bodyAr: "هنا تتحول الفكرة إلى مادة: تصميم، تصوير، نحت، فيديو. كل شيء يُصنع بحرفية وبدون استعجال.", bodyEn: "Here the idea becomes matter: design, photo, cut, film. Everything crafted without rush.", deliver: ["Shoot", "Files", "Cuts", "Edits"] },
    { num: "04", titleAr: "الصقل", titleEn: "Refine", bodyAr: "ندقق على كل ميكرون. التغذية الراجعة جزء من العمل، لا عقبة. نهذب حتى يقول العمل ما نريده تماماً.", bodyEn: "We polish to the micron. Feedback is part of the work. We refine until it speaks exactly.", deliver: ["Reviews", "Iterations", "QA"] },
    { num: "05", titleAr: "التسليم", titleEn: "Deliver", bodyAr: "ملفات نهائية، إرشادات، وكل ما تحتاجه لتطبيق العمل. نبقى متاحين بعد التسليم لأي سؤال.", bodyEn: "Final files, guidelines, and everything you need to apply the work. We stay available after handoff.", deliver: ["Final Files", "Guidelines", "Handoff"] },
  ],

  testimonials: [
    { quoteAr: "أبوبكر ما يصمم لك — يفهمك. أعطيناه فكرة عابرة، رجع لنا بهوية تحس إنها كانت موجودة من البداية.", quoteEn: "AboBakr doesn't just design — he understands. We gave him a passing thought, he returned an identity that felt always there.", name: "نورة الفهد", role: "مؤسسة، رواق", project: "Rawaq Identity" },
    { quoteAr: "شغل الليزر طلع أدق من اللي تخيلته. التفاصيل المذهبة الصغيرة هي اللي خلت المنتج يبيع.", quoteEn: "The laser detail came out sharper than I imagined. The small gilded details are what made the product sell.", name: "عبدالعزيز سعيد", role: "صاحب علامة Bayan", project: "Bayan Acrylic" },
    { quoteAr: "أخرج لنا فيلم رمضان في عشرة أيام. والنتيجة كانت من أفضل ما عرضته القناة في الموسم.", quoteEn: "He delivered the Ramadan film in ten days. It was among the best the channel aired that season.", name: "هند المطيري", role: "منتجة، تمكين", project: "Ramadan 2025" },
    { quoteAr: "تنسيق الزهور للحفل كان فن قائم بذاته. الضيوف صوروه أكثر من العروسين.", quoteEn: "The floral arrangement at the wedding was art on its own. Guests photographed it more than the couple.", name: "ريم القحطاني", role: "عميلة خاصة", project: "Wedding Florals" },
  ],

  blog: [
    { id: "b01", titleAr: "كيف أبني هوية بصرية تتنفس عربياً", titleEn: "Building an identity that breathes Arabic", date: "12 Apr 2026", read: "8 دقائق" },
    { id: "b02", titleAr: "لماذا أرفض المشاريع المستعجلة", titleEn: "Why I turn down rush projects", date: "28 Mar 2026", read: "5 دقائق" },
    { id: "b03", titleAr: "الذهبي ليس لوناً — هو موقف", titleEn: "Gold isn't a color — it's a posture", date: "14 Feb 2026", read: "6 دقائق" },
  ],

  // for AI search demo
  searchIndex: [
    { type: "project", titleAr: "هوية مقهى رواق", titleEn: "Rawaq Café Identity", cat: "تصميم جرافيكس · 2025", page: "single-portfolio", id: "p01", hue: 28, sat: 18, light: 22 },
    { type: "project", titleAr: "ميدالية أكريليك مذهبة", titleEn: "Acrylic Pendant", cat: "ليزر · 2025", page: "single-portfolio", id: "p02", hue: 38, sat: 30, light: 18 },
    { type: "project", titleAr: "إعلان رمضان 2025", titleEn: "Ramadan 2025 Spot", cat: "فيديو · 2025", page: "single-portfolio", id: "p03", hue: 200, sat: 12, light: 14 },
    { type: "project", titleAr: "كتاب طبخ نجود", titleEn: "Najoud Cookbook", cat: "تصميم · 2024", page: "single-portfolio", id: "p05", hue: 18, sat: 22, light: 20 },
    { type: "page", titleAr: "من أنا", titleEn: "About", cat: "صفحة", page: "about" },
    { type: "page", titleAr: "معرض الصور", titleEn: "Gallery", cat: "صفحة", page: "gallery" },
    { type: "product", titleAr: "حزمة LUTs سينمائية", titleEn: "Cinematic LUTs", cat: "رقمي · 120 ر.س", page: "shop", id: "s05" },
    { type: "product", titleAr: "ميدالية ليزر مخصصة", titleEn: "Custom Pendant", cat: "أكريليك · 95 ر.س", page: "shop", id: "s04" },
    { type: "post", titleAr: "كيف أبني هوية بصرية تتنفس عربياً", titleEn: "Identity that breathes Arabic", cat: "مدونة · 8 دقائق", page: "blog", id: "b01" },
    { type: "post", titleAr: "الذهبي ليس لوناً — هو موقف", titleEn: "Gold is a posture", cat: "مدونة · 6 دقائق", page: "blog", id: "b03" },
  ],

  // pricing calc options
  calc: {
    types: [
      { id: "logo", labelAr: "هوية بصرية", labelEn: "Brand Identity", base: 2500 },
      { id: "print", labelAr: "تصميم مطبوعات", labelEn: "Print Design", base: 1200 },
      { id: "video", labelAr: "إنتاج فيديو", labelEn: "Video Production", base: 4000 },
      { id: "laser", labelAr: "قطع ليزر", labelEn: "Laser Cutting", base: 350 },
      { id: "photo", labelAr: "جلسة تصوير", labelEn: "Photo Session", base: 950 },
    ],
    scopes: [
      { id: "S", labelAr: "بسيط", labelEn: "Simple", mult: 1 },
      { id: "M", labelAr: "متوسط", labelEn: "Medium", mult: 1.6 },
      { id: "L", labelAr: "شامل", labelEn: "Comprehensive", mult: 2.4 },
    ],
    timeline: [
      { id: "norm", labelAr: "عادي (3-4 أسابيع)", labelEn: "Normal (3-4 wks)", mult: 1 },
      { id: "fast", labelAr: "مستعجل (1-2 أسبوع)", labelEn: "Rush (1-2 wks)", mult: 1.35 },
      { id: "now",  labelAr: "فوري (أيام)", labelEn: "Express (days)", mult: 1.7 },
    ],
    addons: [
      { id: "rev", labelAr: "تعديلات إضافية", labelEn: "Extra Revisions", price: 200 },
      { id: "src", labelAr: "تسليم ملفات المصدر", labelEn: "Source Files", price: 350 },
      { id: "soc", labelAr: "تكييف للسوشيال", labelEn: "Social Adapt", price: 400 },
      { id: "rights", labelAr: "حقوق امتداد", labelEn: "Extended Rights", price: 600 },
    ],
  },

  social: [
    { id: "ig", label: "Instagram", short: "IG" },
    { id: "be", label: "Behance", short: "Be" },
    { id: "yt", label: "YouTube", short: "YT" },
    { id: "tt", label: "TikTok", short: "TT" },
    { id: "x",  label: "X", short: "X" },
  ],
};
