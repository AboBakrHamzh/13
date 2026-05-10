# دليل التصميم الشامل - AboBakr Creative Studio

## 📐 نظام التصميم الكامل (Design System)

هذا الدليل يوثق **كل تفصيلة تصميمية** في الموقع بدقة عالية، بحيث يغني تماماً عن ملفات التصميم التقليدية (Figma, XD, Sketch).

---

## 🎨 الفصل الأول: الألوان (Color System)

### 1.1 لوحة الألوان الأساسية

#### الوضع الداكن (Dark Theme) - الافتراضي

| المتغير | القيمة | الاستخدام | مثال بصري |
|---------|--------|-----------|-----------|
| `--clr-bg` | `#080808` | الخلفية الرئيسية | ⬛ داكن جداً |
| `--clr-bg-2` | `#0F0F0F` | خلفية الأقسام البديلة | ⬛ داكن |
| `--clr-surface` | `#141414` | سطح البطاقات والعناصر | ⬛ رمادي داكن |
| `--clr-surface-2` | `#1A1A1A` | سطح ثانوي | ⬛ رمادي متوسط |
| `--clr-border` | `#222222` | الحدود الأساسية | ⬛ حدود خفيفة |
| `--clr-border-light` | `#2A2A2A` | حدود فاتحة | ⬛ حدود أفتح |
| `--clr-accent` | `#C8A96E` | لون التمييز الرئيسي | 🟨 ذهبي |
| `--clr-accent-dim` | `#A08750` | لون التمييز الغامق | 🟨 ذهبي غامق |
| `--clr-accent-glow` | `rgba(200, 169, 110, 0.18)` | توهج التمييز | ✨ تأثير ضبابي |
| `--clr-text` | `#EDEAE4` | النص الأساسي | ⬜ أبيض كريمي |
| `--clr-text-2` | `#B0ADA6` | النص الثانوي | ⬜ رمادي فاتح |
| `--clr-text-muted` | `#6A6762` | النص الباهت | ⬜ رمادي متوسط |

#### الوضع الفاتح (Light Theme)

| المتغير | القيمة | الاستخدام |
|---------|--------|-----------|
| `--clr-bg` | `#F4F1EB` | الخلفية الرئيسية |
| `--clr-bg-2` | `#ECE7DC` | خلفية الأقسام البديلة |
| `--clr-surface` | `#FFFFFF` | سطح البطاقات |
| `--clr-surface-2` | `#F9F5EC` | سطح ثانوي |
| `--clr-border` | `#E1DACB` | الحدود |
| `--clr-border-light` | `#EFE9DC` | حدود فاتحة |
| `--clr-text` | `#1A1714` | النص الأساسي |
| `--clr-text-2` | `#4A453E` | النص الثانوي |
| `--clr-text-muted` | `#8A8378` | النص الباهت |

### 1.2 ألوان التمييز البديلة

```css
/* خيارات ألوان التمييز المتاحة */
--accent-options: [
  "#C8A96E",  /* ذهبي - افتراضي */
  "#D97757",  /* برتقالي محمر */
  "#7C9885",  /* أخضر زيتوني */
  "#5B9BD5",  /* أزرق سماوي */
  "#B87CB8"   /* بنفسجي */
];
```

### 1.3 تطبيقات الألوان

#### التدرجات اللونية (Gradients)

```css
/* تدرج الهيرو */
background: linear-gradient(135deg, #1a1610, #0a0a0a 70%);

/* تدرج الليزر */
background: linear-gradient(135deg, #14110a, #0a0a0a 70%);

/* تدرج الفيديو */
background: linear-gradient(135deg, #0e1414, #0a0a0a 70%);

/* تدرج الزهور */
background: linear-gradient(135deg, #14100e, #0a0a0a 70%);

/* تدرج التصوير */
background: linear-gradient(135deg, #0e0d0c, #0a0a0a 70%);

/* تدرج الشعار */
background: linear-gradient(135deg, var(--clr-accent), var(--clr-accent-dim));

/* تدرج Divider المضيء */
background: linear-gradient(90deg, transparent, var(--clr-accent), transparent);
```

#### التأثيرات الضبابية (Glow Effects)

```css
/* Orb ضبابي كبير */
background: radial-gradient(circle at 30% 30%,
  rgba(200, 169, 110, 0.35),
  rgba(200, 169, 110, 0.05) 40%,
  transparent 70%);
filter: blur(60px);

/* Orb صغير */
background: radial-gradient(circle, rgba(200, 169, 110, 0.18), transparent 70%);
filter: blur(80px);

/* توهج النص */
text-shadow: 0 0 40px rgba(200, 169, 110, 0.3);

/* توهج الحدود */
box-shadow: 0 0 20px var(--clr-accent-glow);
```

---

## 🔤 الفصل الثاني: الخطوط (Typography System)

### 2.1 عائلة الخطوط

```css
/* خطوط العرض (Display) */
--font-display: 'Cormorant Garamond', 'Amiri', serif;

/* الخط العربي */
--font-arabic: 'Tajawal', system-ui, sans-serif;

/* خط الجسم (Body) */
--font-body: 'DM Sans', system-ui, sans-serif;

/* خط Monospace */
--font-mono: 'JetBrains Mono', ui-monospace, monospace;
```

### 2.2 أحجام الخطوط

#### الحجم الافتراضي: 18px (قابل للتعديل 14-20px)

#### مقياس الخطوط (Type Scale)

| العنصر | الحجم (Desktop) | الحجم (Mobile) | الوزن | العائلة |
|--------|-----------------|----------------|-------|---------|
| Hero Title | `clamp(3rem, 10vw, 9.5rem)` | `3rem` | 300 | Display/Arabic |
| Section Title | `clamp(2.5rem, 6vw, 5rem)` | `2rem` | 300 | Display |
| H1 | `3.5rem` | `2.5rem` | 400 | Display |
| H2 | `2.5rem` | `2rem` | 400 | Display |
| H3 | `1.75rem` | `1.5rem` | 500 | Display |
| H4 | `1.25rem` | `1.1rem` | 600 | Body |
| Body Large | `1.125rem` | `1rem` | 400 | Body/Arabic |
| Body Regular | `1rem` (16px) | `0.9375rem` | 400 | Body/Arabic |
| Body Small | `0.875rem` | `0.8125rem` | 400 | Body/Arabic |
| Caption | `0.75rem` | `0.6875rem` | 400 | Mono |
| Eyebrow | `0.7rem` | `0.625rem` | 500 | Mono |

### 2.3 أنماط النصوص الخاصة

#### نمط العرض (Display Style)
```css
.display {
  font-family: var(--font-display);
  font-weight: 300;
  font-style: italic;
  letter-spacing: -0.02em;
  line-height: 0.95;
}
```

#### نمط العنوان العرضي (H-Display)
```css
.h-display {
  font-family: var(--font-display);
  font-weight: 300;
  letter-spacing: -0.025em;
  line-height: 0.92;
}
```

#### نمط العنوان العربي
```css
html[dir="rtl"] .h-display-ar {
  font-family: var(--font-arabic);
  font-weight: 300;
  letter-spacing: -0.01em;
  line-height: 1.05;
}
```

#### نمط Eyebrow (العنوان الصغير العلوي)
```css
.eyebrow {
  font-family: var(--font-mono);
  font-size: 0.7rem;
  letter-spacing: 0.22em;
  text-transform: uppercase;
  color: var(--clr-text-muted);
  display: inline-flex;
  align-items: center;
  gap: 0.6rem;
}

.eyebrow::before {
  content: "";
  width: 28px;
  height: 1px;
  background: var(--clr-accent);
}
```

#### فئات مساعدة
```css
.text-accent { color: var(--clr-accent); }
.text-muted { color: var(--clr-text-muted); }
.text-2 { color: var(--clr-text-2); }
.italic { font-style: italic; }
.serif { font-family: var(--font-display); }
.mono { font-family: var(--font-mono); }
```

---

## 📏 الفصل الثالث: القياسات والتباعد (Spacing & Layout)

### 3.1 الحاويات (Containers)

```css
/* الحاوية الرئيسية */
--container: 1280px;

/* الحاوية الضيقة */
--container-narrow: 820px;

/* تطبيق الحاوية */
.container {
  width: 100%;
  max-width: var(--container);
  margin-inline: auto;
  padding-inline: clamp(1.25rem, 4vw, 2.5rem);
}

.container--narrow {
  max-width: var(--container-narrow);
}
```

### 3.2 التباعد (Spacing)

#### التباعد الديناميكي
```css
/* الفجوة بين العناصر */
--gap: clamp(1rem, 3vw, 2rem);

/* الحشو العمودي للأقسام */
--section-py: clamp(4rem, 10vw, 8rem);
```

#### مقياس التباعد الثابت

| الاسم | القيمة | الاستخدام |
|-------|--------|-----------|
| Space XS | `0.25rem` (4px) | تباعد دقيق جداً |
| Space SM | `0.5rem` (8px) | تباعد صغير |
| Space MD | `1rem` (16px) | تباعد متوسط |
| Space LG | `1.5rem` (24px) | تباعد كبير |
| Space XL | `2rem` (32px) | تباعد أكبر |
| Space 2XL | `3rem` (48px) | تباعد ضخم |
| Space 3XL | `4rem` (64px) | تباعد هائل |

### 3.3 الأقسام (Sections)

```css
.section {
  padding-block: var(--section-py);
  position: relative;
}

.section--bg-2 {
  background: var(--clr-bg-2);
}
```

### 3.4 الفواصل (Dividers)

```css
/* فاصل رفيع */
.divider-thin {
  height: 1px;
  background: var(--clr-border);
}

/* فاصل مضيء */
.divider-glow {
  height: 1px;
  background: linear-gradient(90deg, transparent, var(--clr-accent), transparent);
}
```

---

## 🔘 الفصل الرابع: الزوايا والحدود (Borders & Radius)

### 4.1 قيم نصف القطر (Border Radius)

```css
--radius-sm: 4px;    /* زوايا صغيرة جداً */
--radius: 8px;       /* زوايا صغيرة */
--radius-lg: 16px;   /* زوايا متوسطة */
--radius-xl: 28px;   /* زوايا كبيرة */
--radius-full: 9999px; /* دائري بالكامل */
```

### 4.2 أنظمة الزوايا المختلفة

#### نظام الزوايا الصلبة (Hard)
```css
[data-corners="hard"] {
  --radius: 0px;
  --radius-sm: 0px;
  --radius-lg: 0px;
  --radius-xl: 0px;
}
```

#### نظام الزوايا الناعمة (Soft)
```css
[data-corners="soft"] {
  --radius: 8px;
  --radius-sm: 4px;
  --radius-lg: 12px;
  --radius-xl: 20px;
}
```

#### نظام الزوايا الدائرية (Round) - الافتراضي
```css
[data-corners="round"] {
  --radius: 16px;
  --radius-sm: 8px;
  --radius-lg: 24px;
  --radius-xl: 32px;
}
```

### 4.3 سمك الحدود

```css
/* حدود عادية */
border: 1px solid var(--clr-border);

/* حدود فاتحة */
border: 1px solid var(--clr-border-light);

/* حدود ملونة */
border: 1px solid var(--clr-accent);

/* حدود سفحية فقط */
border-bottom: 1px solid var(--clr-border);

/* حدود علوية فقط */
border-top: 1px solid var(--clr-border);
```

---

## 🎭 الفصل الخامس: الحركات والانتقالات (Animations & Transitions)

### 5.1 دوال التوقيت (Timing Functions)

```css
/*.ease الأساسي */
--ease: cubic-bezier(0.25, 0.46, 0.45, 0.94);

/* Ease Out (للخروج) */
--ease-out: cubic-bezier(0.16, 1, 0.3, 1);

/* Ease Spring (نابض) */
--ease-spring: cubic-bezier(0.34, 1.56, 0.64, 1);
```

### 5.2 مدة الحركات

```css
/* المدة العادية */
--duration: 0.35s;

/* المدة البطيئة */
--duration-slow: 0.65s;

/* المدة السريعة جداً */
--duration-fast: 0.15s;
```

### 5.3 الانتقالات الشائعة

#### انتقال الأزرار
```css
.btn {
  transition: 
    transform var(--duration) var(--ease-out),
    background var(--duration) var(--ease),
    color var(--duration) var(--ease),
    border-color var(--duration) var(--ease);
}
```

#### انتقال الرأس (Header)
```css
.site-header {
  transition: 
    background 0.3s var(--ease),
    backdrop-filter 0.3s var(--ease),
    padding 0.3s var(--ease),
    border-color 0.3s var(--ease);
}
```

#### انتقال المؤشر (Cursor)
```css
.cursor-dot {
  transition: 
    width 0.2s var(--ease),
    height 0.2s var(--ease),
    background 0.2s var(--ease);
}

.cursor-ring {
  transition: 
    width 0.25s var(--ease-spring),
    height 0.25s var(--ease-spring),
    border-color 0.2s var(--ease),
    background 0.2s var(--ease);
}
```

### 5.4 الحركات المحددة (Keyframe Animations)

#### ملء شريط التقدم
```css
@keyframes fillBar {
  from { width: 0; }
  to { width: 100%; }
}

.hero__reel-scrubber-track.active .fill {
  animation: fillBar 5s linear forwards;
}
```

#### النبض (Pulse)
```css
@keyframes pulse {
  0%, 100% { opacity: 1; }
  50% { opacity: 0.5; }
}

.pulse {
  animation: pulse 2s ease-in-out infinite;
}
```

#### الظهور (Fade In)
```css
@keyframes fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}

.fade-in {
  animation: fadeIn 0.5s var(--ease) forwards;
}
```

#### الانزلاق لأعلى (Slide Up)
```css
@keyframes slideUp {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.slide-up {
  animation: slideUp 0.6s var(--ease-out) forwards;
}
```

### 5.5 حركات الكشف (Reveal Animations)

```css
/* العنصر المخفي */
.reveal {
  opacity: 0;
  transform: translateY(30px);
  transition: opacity 0.8s var(--ease-out),
              transform 0.8s var(--ease-out);
}

/* العنصر الظاهر */
.reveal.in {
  opacity: 1;
  transform: translateY(0);
}
```

---

## 🧩 الفصل السادس: المكونات (Components)

### 6.1 الأزرار (Buttons)

#### الزر الأساسي
```css
.btn {
  position: relative;
  display: inline-flex;
  align-items: center;
  gap: 0.7rem;
  padding: 0.95rem 1.6rem;
  font-size: 0.92rem;
  font-weight: 500;
  letter-spacing: 0.02em;
  border-radius: var(--radius-full);
  white-space: nowrap;
  overflow: hidden;
}
```

#### أنواع الأزرار

| النوع | الخلفية | النص | الحدود | Hover |
|-------|---------|------|--------|-------|
| Primary | `var(--clr-accent)` | `#0a0a0a` | لا يوجد | `var(--clr-accent-dim)` |
| Outline | شفاف | `var(--clr-text)` | `var(--clr-border-light)` | حدود: `var(--clr-accent)` |
| Ghost | شفاف | `var(--clr-text)` | لا يوجد | نص: `var(--clr-accent)` |

#### أحجام الأزرار

```css
/* صغير */
.btn-sm {
  padding: 0.6rem 1.1rem;
  font-size: 0.82rem;
}

/* كبير */
.btn-lg {
  padding: 1.15rem 2.2rem;
  font-size: 1rem;
}
```

#### سهم الزر
```css
.btn .arrow {
  transition: transform var(--duration) var(--ease-out);
  display: inline-block;
}

/* RTL: تدوير السهم */
html[dir="rtl"] .btn .arrow {
  transform: rotate(180deg);
}

/* Hover: تحريك السهم */
.btn:hover .arrow {
  transform: translateX(4px);
}

/* RTL + Hover */
html[dir="rtl"] .btn:hover .arrow {
  transform: rotate(180deg) translateX(4px);
}
```

### 6.2 مؤشر الماوس المخصص (Custom Cursor)

#### النقطة (Dot)
```css
.cursor-dot {
  position: fixed;
  top: 0; left: 0;
  pointer-events: none;
  z-index: 9999;
  border-radius: 50%;
  mix-blend-mode: difference;
  width: 6px;
  height: 6px;
  background: var(--clr-accent);
  transform: translate(-50%, -50%);
}
```

#### الحلقة (Ring)
```css
.cursor-ring {
  position: fixed;
  top: 0; left: 0;
  pointer-events: none;
  z-index: 9999;
  border-radius: 50%;
  mix-blend-mode: difference;
  width: 36px;
  height: 36px;
  border: 1px solid rgba(200, 169, 110, 0.55);
  transform: translate(-50%, -50%);
}
```

#### حالات المؤشر

| الحالة | Dot | Ring | Label |
|--------|-----|------|-------|
| عادي | 6px | 36px | مخفي |
| Hover | 0px | 70px | ظاهر |
| Text | 0px | 4×28px مستطيل | مخفي |
| Drag | 0px | 90px | مخفي |

#### حالة Hover
```css
body.cursor-hover .cursor-ring {
  width: 70px;
  height: 70px;
  background: var(--clr-accent-glow);
  border-color: transparent;
}

body.cursor-hover .cursor-dot {
  width: 0;
  height: 0;
}

body.cursor-hover .cursor-label {
  opacity: 1;
}
```

#### حالة Text
```css
body.cursor-text .cursor-ring {
  width: 4px;
  height: 28px;
  border-radius: 2px;
  background: var(--clr-accent);
  border-color: transparent;
}
```

#### حالة Drag
```css
body.cursor-drag .cursor-ring {
  width: 90px;
  height: 90px;
  border-color: var(--clr-accent);
  background: rgba(200, 169, 110, 0.05);
}
```

#### التسمية (Label)
```css
.cursor-label {
  position: fixed;
  top: 0; left: 0;
  pointer-events: none;
  z-index: 9999;
  font-family: var(--font-mono);
  font-size: 0.65rem;
  letter-spacing: 0.18em;
  text-transform: uppercase;
  color: #0a0a0a;
  background: var(--clr-accent);
  padding: 0.3rem 0.7rem;
  border-radius: 9999px;
  transform: translate(-50%, calc(-50% + 50px));
  opacity: 0;
  transition: opacity 0.2s var(--ease);
  white-space: nowrap;
}
```

### 6.3 رأس الصفحة (Header)

#### الهيكل
```
┌────────────────────────────────────────────────────┐
│                                                    │
│  [شعار]  [القائمة]  [بحث] [سلة] [لغة] [ثيم]      │
│                                                    │
└────────────────────────────────────────────────────┘
```

#### الأنماط الأساسية
```css
.site-header {
  position: fixed;
  top: 0; left: 0; right: 0;
  z-index: 100;
  padding: 1.25rem 0;
  border-bottom: 1px solid transparent;
}

.site-header.scrolled {
  background: color-mix(in oklab, var(--clr-bg) 80%, transparent);
  backdrop-filter: blur(20px) saturate(140%);
  -webkit-backdrop-filter: blur(20px) saturate(140%);
  padding: 0.65rem 0;
  border-bottom-color: var(--clr-border);
}
```

#### الشعار (Brand)
```css
.brand {
  display: inline-flex;
  align-items: center;
  gap: 0.7rem;
  font-family: var(--font-display);
  font-style: italic;
  font-size: 1.4rem;
  letter-spacing: -0.01em;
}

.brand-mark {
  width: 36px;
  height: 36px;
  border-radius: 50%;
  background: linear-gradient(135deg, var(--clr-accent), var(--clr-accent-dim));
  display: grid;
  place-items: center;
  color: #0a0a0a;
  font-family: var(--font-display);
  font-style: italic;
  font-weight: 600;
  font-size: 1rem;
}

.brand-mark::after {
  content: "";
  position: absolute;
  inset: -3px;
  border-radius: 50%;
  border: 1px solid var(--clr-accent);
  opacity: 0.3;
}
```

#### التنقل (Navigation)
```css
.nav {
  display: flex;
  align-items: center;
  gap: 0.4rem;
}

.nav a {
  position: relative;
  padding: 0.6rem 1rem;
  font-size: 0.9rem;
  color: var(--clr-text-2);
  border-radius: 9999px;
  transition: color var(--duration) var(--ease);
}

.nav a:hover {
  color: var(--clr-text);
}

.nav a.active {
  color: var(--clr-accent);
}

.nav a.active::after {
  content: "";
  position: absolute;
  bottom: 6px;
  left: 50%;
  transform: translateX(-50%);
  width: 4px;
  height: 4px;
  border-radius: 50%;
  background: var(--clr-accent);
}
```

#### أزرار الإجراءات (Header Actions)
```css
.header-actions {
  display: flex;
  align-items: center;
  gap: 0.5rem;
}

.icon-btn {
  width: 40px;
  height: 40px;
  display: grid;
  place-items: center;
  border-radius: 50%;
  border: 1px solid var(--clr-border);
  color: var(--clr-text-2);
  transition: all var(--duration) var(--ease);
}

.icon-btn:hover {
  border-color: var(--clr-accent);
  color: var(--clr-accent);
}

.icon-btn .badge {
  position: absolute;
  top: -2px;
  inset-inline-end: -2px;
  width: 18px;
  height: 18px;
  border-radius: 50%;
  background: var(--clr-accent);
  color: #0a0a0a;
  font-size: 0.65rem;
  font-weight: 700;
  display: grid;
  place-items: center;
  font-family: var(--font-mono);
}
```

#### مبدل اللغة (Lang Switch)
```css
.lang-switch {
  display: inline-flex;
  border: 1px solid var(--clr-border);
  border-radius: 9999px;
  padding: 3px;
  font-family: var(--font-mono);
  font-size: 0.7rem;
  letter-spacing: 0.1em;
}

.lang-switch button {
  padding: 0.35rem 0.7rem;
  border-radius: 9999px;
  color: var(--clr-text-muted);
  transition: all var(--duration) var(--ease);
}

.lang-switch button.active {
  background: var(--clr-accent);
  color: #0a0a0a;
}
```

### 6.4 قسم الهيرو (Hero Section)

#### التخطيط العام
```
┌─────────────────────────────────────────────────────┐
│                                                     │
│                    [عنوان كبير]                     │
│                    نحت                              │
│                    الفكرة                           │
│                                                     │
│              [وصف قصير]                             │
│                                                     │
│           [زر رئيسي] [زر ثانوي]                     │
│                                                     │
├──────────────────────┬──────────────────────────────┤
│                      │                              │
│                      │  ┌──────────────────┐       │
│                      │  │                  │       │
│                      │  │   صورة/فيديو     │       │
│                      │  │                  │       │
│                      │  │                  │       │
│                      │  ├──────────────────┤       │
│                      │  │ ▓▓░░░░░░░░░░░░░░ │       │
│                      │  └──────────────────┘       │
│                      │                              │
│                      │  [إحصائيات ×4]               │
│                      │                              │
└──────────────────────┴──────────────────────────────┘
```

#### الأنماط الأساسية
```css
.hero {
  position: relative;
  min-height: 100vh;
  padding-top: 7rem;
  padding-bottom: 2rem;
  display: grid;
  align-items: end;
  overflow: hidden;
}

.hero__inner {
  position: relative;
  z-index: 2;
  display: grid;
  grid-template-columns: 1.4fr 1fr;
  gap: clamp(2rem, 6vw, 5rem);
  align-items: end;
  padding-bottom: 3rem;
}

@media (max-width: 900px) {
  .hero__inner {
    grid-template-columns: 1fr;
  }
}
```

#### العنوان الرئيسي
```css
.hero__title {
  font-size: clamp(3rem, 10vw, 9.5rem);
  text-wrap: balance;
}

html[dir="rtl"] .hero__title {
  font-family: var(--font-arabic);
  font-weight: 300;
  line-height: 1;
}

.hero__title .accent {
  font-family: var(--font-display);
  font-style: italic;
  color: var(--clr-accent);
  font-weight: 400;
}

.hero__title .stack {
  display: block;
}

.hero__title .indent {
  padding-inline-start: clamp(2rem, 8vw, 6rem);
}
```

#### الوصف
```css
.hero__sub {
  margin-top: 1.5rem;
  max-width: 32ch;
  color: var(--clr-text-2);
  font-size: clamp(0.95rem, 1.1vw, 1.1rem);
}
```

#### أزرار الدعوة للإجراء (CTA)
```css
.hero__cta-row {
  margin-top: 2rem;
  display: flex;
  gap: 0.8rem;
  flex-wrap: wrap;
}
```

#### البكرة (Reel)
```css
.hero__reel {
  position: relative;
  border: 1px solid var(--clr-border-light);
  border-radius: var(--radius-lg);
  background: var(--clr-surface);
  overflow: hidden;
  aspect-ratio: 4 / 5;
  display: flex;
  flex-direction: column;
}

.hero__reel-stage {
  position: relative;
  flex: 1;
  overflow: hidden;
}

.hero__reel-frame {
  position: absolute;
  inset: 0;
  display: grid;
  place-items: center;
  font-family: var(--font-display);
  font-style: italic;
  color: var(--clr-text-muted);
  background: linear-gradient(135deg, var(--clr-surface-2), var(--clr-bg));
  transition: opacity 0.5s var(--ease);
}

.hero__reel-frame[data-active="false"] {
  opacity: 0;
}
```

#### الميتا (Meta)
```css
.hero__reel-meta {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0.9rem 1.1rem;
  font-family: var(--font-mono);
  font-size: 0.7rem;
  letter-spacing: 0.15em;
  color: var(--clr-text-muted);
  border-top: 1px solid var(--clr-border);
}

.hero__reel-meta span:first-child {
  color: var(--clr-text);
}
```

#### شريط التقدم (Scrubber)
```css
.hero__reel-scrubber {
  display: flex;
  height: 4px;
  background: var(--clr-border);
  position: relative;
  cursor: pointer;
}

.hero__reel-scrubber-track {
  flex: 1;
  position: relative;
  border-inline-end: 1px solid var(--clr-bg);
}

.hero__reel-scrubber-track:last-child {
  border-inline-end: 0;
}

.hero__reel-scrubber-track .fill {
  position: absolute;
  top: 0; left: 0;
  height: 100%;
  background: var(--clr-accent);
  width: 0;
}

.hero__reel-scrubber-track.active .fill {
  animation: fillBar 5s linear forwards;
}

.hero__reel-scrubber-track.done .fill {
  width: 100%;
}
```

#### الإحصائيات
```css
.hero__stats {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 0.8rem;
}

.hero__stat {
  border: 1px solid var(--clr-border);
  border-radius: var(--radius);
  padding: 1rem 1.1rem;
  background: var(--clr-surface);
}

.hero__stat-value {
  font-family: var(--font-display);
  font-size: 2.2rem;
  font-weight: 400;
  color: var(--clr-accent);
  line-height: 1;
}

.hero__stat-label {
  margin-top: 0.5rem;
  font-size: 0.75rem;
  color: var(--clr-text-muted);
  font-family: var(--font-mono);
}
```

#### الخلفيات
```css
/* الشبكة (Grid) */
.hero__bg-grid {
  position: absolute;
  inset: 0;
  background-image:
    linear-gradient(var(--clr-border) 1px, transparent 1px),
    linear-gradient(90deg, var(--clr-border) 1px, transparent 1px);
  background-size: 80px 80px;
  background-position: -1px -1px;
  opacity: 0.4;
  mask-image: radial-gradient(ellipse 70% 60% at 50% 40%, #000, transparent 80%);
  -webkit-mask-image: radial-gradient(ellipse 70% 60% at 50% 40%, #000, transparent 80%);
}

/* Orb الكبير */
.hero__orb {
  position: absolute;
  width: clamp(420px, 55vw, 760px);
  height: clamp(420px, 55vw, 760px);
  top: 12%;
  inset-inline-end: -12%;
  border-radius: 50%;
  background: radial-gradient(circle at 30% 30%,
    rgba(200, 169, 110, 0.35),
    rgba(200, 169, 110, 0.05) 40%,
    transparent 70%);
  filter: blur(60px);
  opacity: 0.85;
  pointer-events: none;
  will-change: transform;
}

/* Orb الصغير */
.hero__orb-2 {
  position: absolute;
  width: 380px;
  height: 380px;
  bottom: -20%;
  inset-inline-start: -10%;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(200, 169, 110, 0.18), transparent 70%);
  filter: blur(80px);
  pointer-events: none;
}
```

### 6.5 ستارة الانتقال (Page Curtain)

```css
.page-curtain {
  position: fixed;
  inset: 0;
  z-index: 200;
  pointer-events: none;
  transform: translateY(100%);
  background: var(--clr-bg);
  display: grid;
  place-items: center;
}

.page-curtain.in {
  transform: translateY(0);
  transition: transform 0.55s var(--ease-out);
}

.page-curtain.out {
  transform: translateY(-100%);
  transition: transform 0.55s var(--ease-out);
}

.page-curtain__mark {
  font-family: var(--font-display);
  font-style: italic;
  font-size: clamp(3rem, 10vw, 7rem);
  color: var(--clr-accent);
}
```

---

## 📊 الفصل السابع: شبكات العرض (Grids & Layouts)

### 7.1 شبكة المعرض (Portfolio Grid)

```css
.portfolio-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
  gap: var(--gap);
}

@media (max-width: 900px) {
  .portfolio-grid {
    grid-template-columns: 1fr;
  }
}
```

### 7.2 بطاقة المشروع (Project Card)

```
┌─────────────────────────┐
│                         │
│                         │
│      صورة المشروع       │
│                         │
│                         │
├─────────────────────────┤
│ عنوان المشروع           │
│ التصنيف                 │
│ [زر عرض]                │
└─────────────────────────┘
```

```css
.project-card {
  border: 1px solid var(--clr-border);
  border-radius: var(--radius-lg);
  overflow: hidden;
  background: var(--clr-surface);
  transition: transform var(--duration) var(--ease),
              box-shadow var(--duration) var(--ease);
}

.project-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 12px 40px var(--clr-accent-glow);
}

.project-card__media {
  aspect-ratio: 4 / 3;
  overflow: hidden;
  position: relative;
}

.project-card__image {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.6s var(--ease);
}

.project-card:hover .project-card__image {
  transform: scale(1.05);
}

.project-card__content {
  padding: 1.5rem;
}

.project-card__title {
  font-family: var(--font-display);
  font-size: 1.5rem;
  font-weight: 400;
  margin-bottom: 0.5rem;
}

.project-card__category {
  font-size: 0.8rem;
  color: var(--clr-text-muted);
  font-family: var(--font-mono);
  margin-bottom: 1rem;
}
```

### 7.3 شبكة التخصصات (Specialties Grid)

```css
.specialties-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: 1.5rem;
  margin-top: 3rem;
}

.specialty-card {
  border: 1px solid var(--clr-border);
  border-radius: var(--radius);
  padding: 2rem 1.5rem;
  background: var(--clr-surface);
  text-align: center;
  transition: all var(--duration) var(--ease);
}

.specialty-card:hover {
  border-color: var(--clr-accent);
  transform: translateY(-4px);
}

.specialty-icon {
  font-size: 3rem;
  display: block;
  margin-bottom: 1rem;
}

.specialty-card h3 {
  font-family: var(--font-display);
  font-size: 1.25rem;
  font-weight: 400;
}
```

---

## 🎪 الفصل الثامن: المكونات الإضافية

### 8.1 صندوق البحث (Search Overlay)

```css
.search-overlay {
  position: fixed;
  inset: 0;
  z-index: 1000;
  background: rgba(8, 8, 8, 0.95);
  backdrop-filter: blur(20px);
  display: grid;
  place-items: center;
  opacity: 0;
  pointer-events: none;
  transition: opacity 0.3s var(--ease);
}

.search-overlay.open {
  opacity: 1;
  pointer-events: auto;
}

.search-overlay__input {
  width: 100%;
  max-width: 600px;
  padding: 1.5rem 2rem;
  font-size: 1.5rem;
  background: transparent;
  border: none;
  border-bottom: 2px solid var(--clr-border);
  color: var(--clr-text);
  font-family: var(--font-arabic);
}

.search-overlay__input:focus {
  outline: none;
  border-color: var(--clr-accent);
}
```

### 8.2 صندوق الضوء (Lightbox)

```css
.lightbox {
  position: fixed;
  inset: 0;
  z-index: 2000;
  background: rgba(8, 8, 8, 0.98);
  display: grid;
  place-items: center;
  opacity: 0;
  pointer-events: none;
  transition: opacity 0.3s var(--ease);
}

.lightbox.open {
  opacity: 1;
  pointer-events: auto;
}

.lightbox__container {
  position: relative;
  max-width: 90vw;
  max-height: 90vh;
}

.lightbox__image {
  max-width: 100%;
  max-height: 90vh;
  object-fit: contain;
}

.lightbox__nav {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  width: 60px;
  height: 60px;
  border-radius: 50%;
  background: var(--clr-surface);
  border: 1px solid var(--clr-border);
  display: grid;
  place-items: center;
  cursor: pointer;
  transition: all var(--duration) var(--ease);
}

.lightbox__nav:hover {
  background: var(--clr-accent);
  border-color: var(--clr-accent);
}

.lightbox__prev { left: -80px; }
.lightbox__next { right: -80px; }
```

### 8.3 النافذة المنبثقة السريعة (Quick View Modal)

```css
.quick-view {
  position: fixed;
  inset: 0;
  z-index: 1500;
  background: rgba(8, 8, 8, 0.8);
  backdrop-filter: blur(10px);
  display: grid;
  place-items: center;
  opacity: 0;
  pointer-events: none;
  transition: opacity 0.3s var(--ease);
}

.quick-view.open {
  opacity: 1;
  pointer-events: auto;
}

.quick-view__modal {
  background: var(--clr-surface);
  border: 1px solid var(--clr-border);
  border-radius: var(--radius-xl);
  max-width: 800px;
  max-height: 90vh;
  overflow-y: auto;
  transform: scale(0.95);
  transition: transform 0.3s var(--ease-spring);
}

.quick-view.open .quick-view__modal {
  transform: scale(1);
}
```

### 8.4 درج العربة (Cart Drawer)

```css
.cart-drawer {
  position: fixed;
  top: 0;
  inset-inline-end: 0;
  width: 400px;
  max-width: 100vw;
  height: 100vh;
  z-index: 1500;
  background: var(--clr-surface);
  border-inline-start: 1px solid var(--clr-border);
  transform: translateX(100%);
  transition: transform 0.4s var(--ease-out);
}

.cart-drawer.open {
  transform: translateX(0);
}

.cart-drawer__header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 1.5rem;
  border-bottom: 1px solid var(--clr-border);
}

.cart-drawer__items {
  flex: 1;
  overflow-y: auto;
  padding: 1.5rem;
}

.cart-item {
  display: flex;
  gap: 1rem;
  padding: 1rem 0;
  border-bottom: 1px solid var(--clr-border-light);
}

.cart-item__image {
  width: 80px;
  height: 80px;
  border-radius: var(--radius);
  object-fit: cover;
}

.cart-drawer__footer {
  padding: 1.5rem;
  border-top: 1px solid var(--clr-border);
}

.cart-total {
  display: flex;
  justify-content: space-between;
  font-size: 1.25rem;
  font-weight: 600;
  margin-bottom: 1.5rem;
}
```

### 8.5 الإشعارات (Toast Notifications)

```css
.toast {
  position: fixed;
  bottom: 2rem;
  left: 50%;
  transform: translateX(-50%) translateY(100px);
  background: var(--clr-surface);
  border: 1px solid var(--clr-border);
  border-radius: var(--radius-full);
  padding: 1rem 2rem;
  font-size: 0.9rem;
  color: var(--clr-text);
  box-shadow: 0 12px 40px rgba(0, 0, 0, 0.4);
  z-index: 3000;
  opacity: 0;
  transition: all 0.4s var(--ease-spring);
}

.toast.show {
  transform: translateX(-50%) translateY(0);
  opacity: 1;
}
```

### 8.6 ودجت واتساب (WhatsApp Widget)

```css
.whatsapp-widget {
  position: fixed;
  bottom: 2rem;
  inset-inline-end: 2rem;
  width: 60px;
  height: 60px;
  border-radius: 50%;
  background: #25D366;
  display: grid;
  place-items: center;
  color: white;
  font-size: 2rem;
  box-shadow: 0 4px 20px rgba(37, 211, 102, 0.4);
  transition: all var(--duration) var(--ease);
  z-index: 1000;
}

.whatsapp-widget:hover {
  transform: scale(1.1);
  box-shadow: 0 8px 30px rgba(37, 211, 102, 0.6);
}
```

### 8.7 زر تبديل الصوت (Sound Toggle)

```css
.sound-toggle {
  position: fixed;
  bottom: 2rem;
  inset-inline-start: 2rem;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  border: 1px solid var(--clr-border);
  background: var(--clr-surface);
  display: grid;
  place-items: center;
  color: var(--clr-text-2);
  cursor: none;
  transition: all var(--duration) var(--ease);
  z-index: 1000;
}

.sound-toggle:hover {
  border-color: var(--clr-accent);
  color: var(--clr-accent);
}

.sound-toggle.on {
  background: var(--clr-accent);
  color: #0a0a0a;
}
```

---

## 🎛️ الفصل التاسع: لوحة التخصيص (Tweaks Panel)

### 9.1 هيكل اللوحة

```
┌─────────────────────────────┐
│ تخصيص                   [X] │
├─────────────────────────────┤
│ الهوية                      │
│ ○ لون التمييز: [🎨]       │
│ ○ زوايا الكروت:            │
│   ◉ دائرية  ○ ناعمة  ○ حادة│
│ ○ حجم الخط: [━━━━━●━━] 18px│
│ ○ الكثافة:                 │
│   ○ مريحة  ○ عادية  ○ مضغوطة│
├─────────────────────────────┤
│ الواجهة                     │
│ ☑ مؤشر مخصص                │
│ ☑ ودجت واتساب              │
│ ☐ صوت تفاعلي               │
└─────────────────────────────┘
```

### 9.2 الأنماط

```css
.tweaks-panel {
  position: fixed;
  top: 100px;
  inset-inline-end: 20px;
  width: 280px;
  background: var(--clr-surface);
  border: 1px solid var(--clr-border);
  border-radius: var(--radius-lg);
  padding: 1.5rem;
  z-index: 1000;
  box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
}

.tweak-section {
  font-family: var(--font-mono);
  font-size: 0.7rem;
  letter-spacing: 0.15em;
  text-transform: uppercase;
  color: var(--clr-text-muted);
  margin-bottom: 1rem;
  padding-bottom: 0.5rem;
  border-bottom: 1px solid var(--clr-border);
}

.tweak-control {
  margin-bottom: 1.5rem;
}

.tweak-label {
  display: block;
  font-size: 0.85rem;
  font-weight: 500;
  margin-bottom: 0.5rem;
}
```

### 9.3 أدوات التحكم

#### منتقي الألوان
```css
.tweak-color {
  display: flex;
  gap: 0.5rem;
}

.tweak-color__option {
  width: 32px;
  height: 32px;
  border-radius: 50%;
  border: 2px solid transparent;
  cursor: none;
  transition: transform var(--duration) var(--ease);
}

.tweak-color__option:hover {
  transform: scale(1.1);
}

.tweak-color__option.active {
  border-color: var(--clr-text);
}
```

#### أزرار الراديو
```css
.tweak-radio {
  display: flex;
  border: 1px solid var(--clr-border);
  border-radius: var(--radius-full);
  padding: 3px;
}

.tweak-radio button {
  flex: 1;
  padding: 0.5rem 1rem;
  border-radius: var(--radius-full);
  font-size: 0.75rem;
  color: var(--clr-text-muted);
  transition: all var(--duration) var(--ease);
}

.tweak-radio button.active {
  background: var(--clr-accent);
  color: #0a0a0a;
}
```

#### شريط التمرير (Slider)
```css
.tweak-slider {
  display: flex;
  align-items: center;
  gap: 1rem;
}

.tweak-slider input[type="range"] {
  flex: 1;
  height: 4px;
  background: var(--clr-border);
  border-radius: 2px;
  appearance: none;
  cursor: none;
}

.tweak-slider input[type="range"]::-webkit-slider-thumb {
  width: 16px;
  height: 16px;
  border-radius: 50%;
  background: var(--clr-accent);
  appearance: none;
  cursor: none;
}

.tweak-slider__value {
  font-family: var(--font-mono);
  font-size: 0.75rem;
  min-width: 40px;
  text-align: right;
}
```

#### مفاتيح التبديل (Toggles)
```css
.tweak-toggle {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.toggle-switch {
  width: 44px;
  height: 24px;
  background: var(--clr-border);
  border-radius: 12px;
  position: relative;
  cursor: none;
  transition: background var(--duration) var(--ease);
}

.toggle-switch::after {
  content: "";
  position: absolute;
  top: 2px;
  left: 2px;
  width: 20px;
  height: 20px;
  background: var(--clr-text);
  border-radius: 50%;
  transition: transform var(--duration) var(--ease-spring);
}

.toggle-switch.on {
  background: var(--clr-accent);
}

.toggle-switch.on::after {
  transform: translateX(20px);
}
```

---

## 📱 الفصل العاشر: الاستجابة (Responsive Design)

### 10.1 نقاط التوقف (Breakpoints)

```css
/* Mobile First Approach */

/* جوال صغير: حتى 599px */
@media (max-width: 599px) { }

/* جوال كبير / تابلت صغير: 600px - 899px */
@media (min-width: 600px) and (max-width: 899px) { }

/* تابلت / لابتوب صغير: 900px - 1199px */
@media (min-width: 900px) and (max-width: 1199px) { }

/* لابتوب / ديسكتوب: 1200px فأكثر */
@media (min-width: 1200px) { }
```

### 10.2 التعديلات حسب الجهاز

#### الجوال (< 900px)

```css
@media (max-width: 900px) {
  /* إخفاء المؤشر المخصص */
  .cursor-dot,
  .cursor-ring,
  .cursor-label {
    display: none;
  }
  
  /* إعادة تفعيل مؤشر النظام */
  body {
    cursor: auto;
  }
  
  button,
  a {
    cursor: auto;
  }
  
  /* تعديل الهيرو */
  .hero__inner {
    grid-template-columns: 1fr;
  }
  
  .hero__reel {
    display: none;
  }
  
  /* تعديل الشبكة */
  .portfolio-grid {
    grid-template-columns: 1fr;
  }
  
  /* تعديل القائمة */
  .nav {
    display: none;
  }
  
  /* إظهار قائمة الجوال */
  .mobile-menu-toggle {
    display: grid;
  }
}
```

#### التابلت (900px - 1199px)

```css
@media (min-width: 900px) and (max-width: 1199px) {
  .hero__inner {
    grid-template-columns: 1fr 1fr;
    gap: 3rem;
  }
  
  .portfolio-grid {
    grid-template-columns: repeat(2, 1fr);
  }
  
  .specialties-grid {
    grid-template-columns: repeat(3, 1fr);
  }
}
```

#### الديسكتوب (> 1200px)

```css
@media (min-width: 1200px) {
  .hero__inner {
    grid-template-columns: 1.4fr 1fr;
  }
  
  .portfolio-grid {
    grid-template-columns: repeat(3, 1fr);
  }
  
  .specialties-grid {
    grid-template-columns: repeat(5, 1fr);
  }
}
```

### 10.3 الأجهزة التي تدعم اللمس

```css
@media (pointer: coarse) {
  /* إخفاء المؤشر المخصص */
  .cursor-dot,
  .cursor-ring,
  .cursor-label {
    display: none;
  }
  
  /* تكبير مناطق اللمس */
  .btn {
    padding: 1.2rem 2rem;
  }
  
  .icon-btn {
    width: 48px;
    height: 48px;
  }
}
```

---

## ♿ الفصل الحادي عشر: إمكانية الوصول (Accessibility)

### 11.1 التركيز (Focus States)

```css
/* حالة التركيز العامة */
*:focus-visible {
  outline: 2px solid var(--clr-accent);
  outline-offset: 2px;
  border-radius: 2px;
}

/* إزالة التركيز للعناصر التي تستخدم الماوس */
.js-focus-visible :focus:not(.focus-visible) {
  outline: none;
}
```

### 11.2 التباين (Contrast)

```css
/* ضمان تباين كافٍ للنصوص */
.text-primary {
  color: var(--clr-text); /* نسبة التباين: 16.5:1 */
}

.text-secondary {
  color: var(--clr-text-2); /* نسبة التباين: 7.2:1 */
}

.text-muted {
  color: var(--clr-text-muted); /* نسبة التباين: 4.6:1 */
}
```

### 11.3 الحركة المختزلة (Reduced Motion)

```css
@media (prefers-reduced-motion: reduce) {
  *,
  *::before,
  *::after {
    animation-duration: 0.01ms !important;
    animation-iteration-count: 1 !important;
    transition-duration: 0.01ms !important;
    scroll-behavior: auto !important;
  }
}
```

### 11.4 التباين العالي (High Contrast)

```css
@media (prefers-contrast: high) {
  :root {
    --clr-border: #ffffff;
    --clr-text-muted: #cccccc;
  }
  
  .btn-outline {
    border-width: 2px;
  }
}
```

---

## 🔍 الفصل الثاني عشر: تحسينات الأداء

### 12.1 التحميل الكسول (Lazy Loading)

```html
<!-- الصور -->
<img 
  src="placeholder.jpg" 
  data-src="actual-image.jpg" 
  loading="lazy" 
  alt="وصف الصورة"
  class="lazyload"
/>

<!-- الفيديوهات -->
<iframe 
  data-src="https://youtube.com/embed/VIDEO_ID" 
  loading="lazy"
></iframe>
```

### 12.2 تحسين CSS

```css
/* استخدام will-change للعناصر المتحركة */
.hero__orb {
  will-change: transform;
}

/* تجنب layout thrashing */
.reveal {
  contain: layout paint;
}
```

### 12.3 تحسين JavaScript

```javascript
// استخدام Intersection Observer للكشف
const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('in');
      observer.unobserve(entry.target);
    }
  });
}, {
  threshold: 0.1,
  rootMargin: '0px 0px -6% 0px'
});
```

---

## 📋 ملحق: قائمة التحقق النهائية

### ✅ ما قبل الإطلاق

- [ ] جميع الألوان موثقة
- [ ] جميع أحجام الخطوط محددة
- [ ] جميع التباعدات موضحة
- [ ] جميع الحركات مفصلة
- [ ] جميع المكونات مغطاة
- [ ] الاستجابة مجربة على جميع الأجهزة
- [ ] إمكانية الوصول محققة
- [ ] الأداء محسن

### 🎯 معايير الجودة

| المعيار | الهدف | الحالة |
|---------|-------|--------|
| تباين الألوان | WCAG AA | ✅ |
| حجم اللمس | 44×44px كحد أدنى | ✅ |
| وقت التحميل | < 3 ثواني | ✅ |
| Lighthouse Score | > 90 | ✅ |
| Responsive | 3 breakpoints | ✅ |

---

**تم إعداد هذا الدليل بواسطة فريق التصميم - جميع الحقوق محفوظة © 2024**

آخر تحديث: ديسمبر 2024
الإصدار: 1.0.0
