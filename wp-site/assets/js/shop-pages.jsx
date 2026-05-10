/* AboBakr — Shop archive, Order page (with calc), About, Contact */

function ShopPage({ lang, addToCart, cartCount, openQuickView }) {
  const all = window.SITE_DATA.shop;
  const [type, setType] = useState('all');
  const [sort, setSort] = useState('featured');
  const filtered = useMemo(() => {
    let r = type === 'all' ? all : all.filter((p) => p.type === type);
    if (sort === 'low') r = [...r].sort((a, b) => a.price - b.price);
    if (sort === 'high') r = [...r].sort((a, b) => b.price - a.price);
    return r;
  }, [type, sort]);
  const types = [
    { id: 'all', ar: 'الكل', en: 'All' },
    { id: 'digital', ar: 'رقمي', en: 'Digital' },
    { id: 'physical', ar: 'مادي', en: 'Physical' },
    { id: 'service', ar: 'خدمات', en: 'Services' },
  ];
  return (
    <main style={{ paddingTop: '8rem' }}>
      <section className="section" style={{ paddingBlock: '3rem 5rem' }}>
        <div className="container">
          <div className="reveal in">
            <div className="eyebrow">{lang === 'ar' ? 'متجر إبداعي' : 'Creative shop'}</div>
            <h1 className="sec-head__title" style={{ fontSize: 'clamp(3rem, 8vw, 7rem)', marginTop: '1rem' }}>
              {lang === 'ar' ? <>المتجر <span className="italic">كاملاً</span></> : <>The full <span className="italic">shop</span></>}
            </h1>
            <p className="text-2" style={{ marginTop: '1rem', maxWidth: 540 }}>
              {lang === 'ar' ? 'منتجات رقمية فورية، قطع مادية مصنوعة يدوياً، وخدمات مخصصة.' : 'Instant digital products, handcrafted physical pieces, bespoke services.'}
            </p>
          </div>
          <div style={{ marginTop: '3rem', display: 'flex', justifyContent: 'space-between', flexWrap: 'wrap', gap: '1rem', alignItems: 'center' }}>
            <div className="filter-row" style={{ marginBottom: 0 }}>
              {types.map((t) => (
                <button key={t.id} className={`filter-chip ${type === t.id ? 'active' : ''}`} onClick={() => setType(t.id)}>
                  {lang === 'ar' ? t.ar : t.en}
                </button>
              ))}
            </div>
            <select className="filter-chip" style={{ background: 'transparent' }} value={sort} onChange={(e) => setSort(e.target.value)}>
              <option value="featured">{lang === 'ar' ? 'مميز' : 'Featured'}</option>
              <option value="low">{lang === 'ar' ? 'سعر تصاعدي' : 'Price ↑'}</option>
              <option value="high">{lang === 'ar' ? 'سعر تنازلي' : 'Price ↓'}</option>
            </select>
          </div>
          <div className="product-grid" style={{ marginTop: '2rem' }}>
            {filtered.map((p, i) => <ProductCardV2 key={p.id} p={p} lang={lang} addToCart={addToCart} openQuickView={openQuickView} hue={20 + i * 30} />)}
          </div>
        </div>
      </section>
    </main>
  );
}

function PricingCalculator({ lang }) {
  const cfg = window.SITE_DATA.calc;
  const [type, setType] = useState(cfg.types[0].id);
  const [scope, setScope] = useState('M');
  const [timeline, setTimeline] = useState('norm');
  const [revisions, setRevisions] = useState(2);
  const [addons, setAddons] = useState([]);

  const total = useMemo(() => {
    const t = cfg.types.find((x) => x.id === type);
    const s = cfg.scopes.find((x) => x.id === scope);
    const tl = cfg.timeline.find((x) => x.id === timeline);
    let base = t.base * s.mult * tl.mult;
    base += revisions * 150;
    addons.forEach((id) => { const a = cfg.addons.find((x) => x.id === id); if (a) base += a.price; });
    return Math.round(base);
  }, [type, scope, timeline, revisions, addons]);

  const toggleAddon = (id) => setAddons((a) => a.includes(id) ? a.filter((x) => x !== id) : [...a, id]);

  return (
    <div className="calc">
      <div className="calc__form">
        <div className="calc__row">
          <span className="calc__label"><span>{lang === 'ar' ? 'نوع المشروع' : 'Project type'}</span><span className="num">01</span></span>
          <div className="calc__opts">
            {cfg.types.map((t) => (
              <button key={t.id} className={`calc__opt ${type === t.id ? 'active' : ''}`} onClick={() => setType(t.id)}>
                <span className="calc__opt-label">{lang === 'ar' ? t.labelAr : t.labelEn}</span>
                <span className="calc__opt-price">{lang === 'ar' ? `يبدأ ${fmtSAR(t.base, lang)} ر.س` : `from ${fmtSAR(t.base, lang)} SAR`}</span>
              </button>
            ))}
          </div>
        </div>
        <div className="calc__row">
          <span className="calc__label"><span>{lang === 'ar' ? 'حجم المشروع' : 'Scope'}</span><span className="num">02</span></span>
          <div className="calc__opts">
            {cfg.scopes.map((s) => (
              <button key={s.id} className={`calc__opt ${scope === s.id ? 'active' : ''}`} onClick={() => setScope(s.id)}>
                <span className="calc__opt-label">{lang === 'ar' ? s.labelAr : s.labelEn}</span>
                <span className="calc__opt-price">×{s.mult}</span>
              </button>
            ))}
          </div>
        </div>
        <div className="calc__row">
          <span className="calc__label"><span>{lang === 'ar' ? 'الجدول الزمني' : 'Timeline'}</span><span className="num">03</span></span>
          <div className="calc__opts">
            {cfg.timeline.map((t) => (
              <button key={t.id} className={`calc__opt ${timeline === t.id ? 'active' : ''}`} onClick={() => setTimeline(t.id)}>
                <span className="calc__opt-label">{lang === 'ar' ? t.labelAr : t.labelEn}</span>
                <span className="calc__opt-price">×{t.mult}</span>
              </button>
            ))}
          </div>
        </div>
        <div className="calc__row">
          <span className="calc__label"><span>{lang === 'ar' ? `التعديلات: ${revisions}` : `Revisions: ${revisions}`}</span><span className="num">04</span></span>
          <input type="range" className="calc__slider" min="0" max="6" value={revisions} onChange={(e) => setRevisions(+e.target.value)} />
        </div>
        <div className="calc__row">
          <span className="calc__label"><span>{lang === 'ar' ? 'إضافات' : 'Add-ons'}</span><span className="num">05</span></span>
          <div className="calc__opts">
            {cfg.addons.map((a) => (
              <button key={a.id} className={`calc__opt ${addons.includes(a.id) ? 'active' : ''}`} onClick={() => toggleAddon(a.id)}>
                <span className="calc__opt-label">{lang === 'ar' ? a.labelAr : a.labelEn}</span>
                <span className="calc__opt-price">+{fmtSAR(a.price, lang)}</span>
              </button>
            ))}
          </div>
        </div>
      </div>
      <div className="calc__summary">
        <div className="eyebrow">{lang === 'ar' ? 'الملخص' : 'Summary'}</div>
        <div className="calc__summary-row"><span>{lang === 'ar' ? 'النوع' : 'Type'}</span><span className="v">{lang === 'ar' ? cfg.types.find(x=>x.id===type).labelAr : cfg.types.find(x=>x.id===type).labelEn}</span></div>
        <div className="calc__summary-row"><span>{lang === 'ar' ? 'الحجم' : 'Scope'}</span><span className="v">{lang === 'ar' ? cfg.scopes.find(x=>x.id===scope).labelAr : cfg.scopes.find(x=>x.id===scope).labelEn}</span></div>
        <div className="calc__summary-row"><span>{lang === 'ar' ? 'الزمن' : 'Timeline'}</span><span className="v">{lang === 'ar' ? cfg.timeline.find(x=>x.id===timeline).labelAr : cfg.timeline.find(x=>x.id===timeline).labelEn}</span></div>
        <div className="calc__summary-row"><span>{lang === 'ar' ? 'التعديلات' : 'Revisions'}</span><span className="v">{revisions}</span></div>
        <div className="calc__summary-row"><span>{lang === 'ar' ? 'الإضافات' : 'Add-ons'}</span><span className="v">{addons.length}</span></div>
        <div className="calc__total">
          <div className="calc__total-label">{lang === 'ar' ? 'تقدير السعر' : 'Estimated price'}</div>
          <div className="calc__total-value">{fmtSAR(total, lang)}<small>{lang === 'ar' ? ' ر.س' : ' SAR'}</small></div>
          <div className="text-muted" style={{ fontSize: '0.78rem', marginTop: '0.3rem' }}>{lang === 'ar' ? '* تقدير مبدئي. قد يتغيّر بعد تفاصيل المشروع.' : '* Initial estimate. May change after details.'}</div>
        </div>
        <Magnet><button className="btn btn-primary" style={{ width: '100%', justifyContent: 'center' }}>
          {lang === 'ar' ? 'اطلب رسمياً' : 'Request official quote'} <span className="arrow">→</span>
        </button></Magnet>
      </div>
    </div>
  );
}

function OrderPage({ lang }) {
  return (
    <main style={{ paddingTop: '8rem' }}>
      <section className="section" style={{ paddingBlock: '3rem 5rem' }}>
        <div className="container">
          <div className="reveal in">
            <div className="eyebrow">{lang === 'ar' ? 'طلب مخصص' : 'Custom order'}</div>
            <h1 className="sec-head__title" style={{ fontSize: 'clamp(3rem, 8vw, 7rem)', marginTop: '1rem' }}>
              {lang === 'ar' ? <>قدّر <span className="italic">سعرك</span></> : <>Estimate <span className="italic">your price</span></>}
            </h1>
            <p className="text-2" style={{ marginTop: '1rem', maxWidth: 540 }}>
              {lang === 'ar' ? 'حدد التفاصيل وسأرجع لك بسعر دقيق خلال يوم.' : 'Configure your project and I\'ll reply with a precise quote in a day.'}
            </p>
          </div>
          <div className="reveal" style={{ marginTop: '3rem' }}>
            <PricingCalculator lang={lang} />
          </div>
          <div className="reveal" style={{ marginTop: '4rem', display: 'grid', gridTemplateColumns: '1fr 1fr', gap: '2rem' }}>
            <div>
              <h3 className="sec-head__title" style={{ fontSize: 'clamp(1.5rem, 3vw, 2.4rem)', marginBottom: '1.5rem' }}>
                {lang === 'ar' ? <>أو ابعث <span className="italic">تفاصيلك</span></> : <>Or send <span className="italic">your brief</span></>}
              </h3>
              <p className="text-2">{lang === 'ar' ? 'املأ النموذج وسأرد خلال ٢٤ ساعة.' : 'Fill the form and I\'ll reply within 24 hours.'}</p>
            </div>
            <form onSubmit={(e) => { e.preventDefault(); alert(lang === 'ar' ? 'تم الإرسال — سأرد قريباً.' : 'Sent — I\'ll get back soon.'); }}>
              <div style={{ display: 'grid', gridTemplateColumns: '1fr 1fr', gap: '1rem' }}>
                <div className="form-row"><label>{lang === 'ar' ? 'الاسم' : 'Name'}</label><input required /></div>
                <div className="form-row"><label>{lang === 'ar' ? 'الإيميل' : 'Email'}</label><input type="email" required /></div>
              </div>
              <div className="form-row"><label>{lang === 'ar' ? 'الميزانية التقريبية' : 'Approx. budget'}</label><input placeholder={lang === 'ar' ? 'ر.س' : 'SAR'} /></div>
              <div className="form-row"><label>{lang === 'ar' ? 'وصف المشروع' : 'Project brief'}</label><textarea rows="5" required></textarea></div>
              <Magnet><button className="btn btn-primary" type="submit">{lang === 'ar' ? 'إرسال الطلب' : 'Send request'} <span className="arrow">→</span></button></Magnet>
            </form>
          </div>
        </div>
      </section>
    </main>
  );
}

function AboutPage({ lang, setPage }) {
  const tools = ['Adobe Illustrator', 'Adobe Photoshop', 'Adobe InDesign', 'Premiere Pro', 'After Effects', 'DaVinci Resolve', 'Lightroom', 'Figma', 'Trotec Laser', 'Lightburn'];
  const timeline = [
    { y: '2018', ar: 'بدأت العمل الحر بالتصميم', en: 'Started freelance design' },
    { y: '2020', ar: 'دخلت عالم قطع الليزر', en: 'Entered laser cutting' },
    { y: '2022', ar: 'إنتاج أول فيلم قصير', en: 'First short film' },
    { y: '2024', ar: 'افتتاح الاستوديو', en: 'Opened the studio' },
    { y: '2026', ar: 'أنت هنا', en: 'You are here' },
  ];
  return (
    <main style={{ paddingTop: '8rem' }}>
      <section className="section" style={{ paddingBlock: '3rem' }}>
        <div className="container">
          <div className="about-hero reveal in">
            <div>
              <div className="eyebrow">{lang === 'ar' ? 'القصة' : 'The story'}</div>
              <h1 className="sec-head__title" style={{ fontSize: 'clamp(2.5rem, 7vw, 6rem)', margin: '1rem 0 1.5rem' }}>
                {lang === 'ar' ? <>أبوبكر، <span className="italic">صانع</span> من الرياض.</> : <>AboBakr, <span className="italic">a maker</span> from Riyadh.</>}
              </h1>
              <p className="lead">
                {lang === 'ar'
                  ? 'بدأت برسم بسيط على ورق، وانتهيت بخمسة تخصصات تلتقي عند نقطة واحدة: الحسّ البصري الذي يحترم المعنى قبل الشكل.'
                  : 'I began with a simple drawing on paper, and ended up at five disciplines meeting at one point: a visual sensibility that respects meaning before form.'}
              </p>
              <p className="text-2" style={{ marginBottom: '1.5rem' }}>
                {lang === 'ar'
                  ? 'كل تخصص يفتح باباً للآخر. الجرافيكس علّمني الإيقاع، الكاميرا علمتني الصبر، الليزر علّمني الدقة، الزهور علمتني التواضع، والفيلم جمعها كلها.'
                  : 'Each craft opens a door to the next. Graphics taught me rhythm, the camera patience, laser precision, florals humility, and film tied them all together.'}
              </p>
              <div className="about-list">
                <div className="about-list-item"><div className="label">{lang === 'ar' ? 'الموقع' : 'Based in'}</div><div className="val">{lang === 'ar' ? 'الرياض، السعودية' : 'Riyadh, KSA'}</div></div>
                <div className="about-list-item"><div className="label">{lang === 'ar' ? 'منذ' : 'Working since'}</div><div className="val">2018</div></div>
                <div className="about-list-item"><div className="label">{lang === 'ar' ? 'لغات' : 'Languages'}</div><div className="val">{lang === 'ar' ? 'عربي · إنجليزي' : 'Arabic · English'}</div></div>
                <div className="about-list-item"><div className="label">{lang === 'ar' ? 'متاح' : 'Available'}</div><div className="val" style={{ color: '#7CB87C' }}>● {lang === 'ar' ? 'لمشروع جديد' : 'For new work'}</div></div>
              </div>
              <div style={{ marginTop: '2rem', display: 'flex', gap: '0.6rem' }}>
                <Magnet><button className="btn btn-primary" onClick={() => setPage('order')}>{lang === 'ar' ? 'ابدأ مشروعاً' : 'Start a project'}</button></Magnet>
                <Magnet><button className="btn btn-outline">{lang === 'ar' ? 'حمّل CV' : 'Download CV'} ↓</button></Magnet>
              </div>
            </div>
            <div className="about-portrait" style={{ minHeight: 600 }}>
              <div className="about-stack"><span>RIYADH · KSA</span><span>EST. 2018</span></div>
            </div>
          </div>
        </div>
      </section>

      <section className="section section--bg-2">
        <div className="container">
          <div className="sec-head reveal">
            <div>
              <div className="eyebrow">{lang === 'ar' ? 'الرحلة' : 'Journey'}</div>
              <h2 className="sec-head__title" style={{ marginTop: '0.7rem' }}>
                {lang === 'ar' ? <>محطات <span className="italic">مهمة</span></> : <>Defining <span className="italic">moments</span></>}
              </h2>
            </div>
          </div>
          <div className="reveal" style={{ position: 'relative', display: 'grid', gridTemplateColumns: 'repeat(5, 1fr)', gap: '1rem' }}>
            {timeline.map((t, i) => (
              <div key={i} style={{ borderInlineStart: '1px solid var(--clr-border)', paddingInlineStart: '1.5rem', paddingBlock: '1rem' }}>
                <div className="hero__stat-value" style={{ fontSize: '2.2rem' }}>{t.y}</div>
                <div className="text-2" style={{ marginTop: '0.4rem', fontSize: '0.9rem' }}>{lang === 'ar' ? t.ar : t.en}</div>
              </div>
            ))}
          </div>
        </div>
      </section>

      <section className="section">
        <div className="container">
          <div className="sec-head reveal">
            <div>
              <div className="eyebrow">{lang === 'ar' ? 'الأدوات' : 'The tools'}</div>
              <h2 className="sec-head__title" style={{ marginTop: '0.7rem' }}>{lang === 'ar' ? <>ما <span className="italic">أستخدم</span></> : <>What I <span className="italic">use</span></>}</h2>
            </div>
          </div>
          <div className="reveal" style={{ display: 'flex', flexWrap: 'wrap', gap: '0.6rem' }}>
            {tools.map((t) => <span key={t} className="deliver-chip" style={{ padding: '0.7rem 1.2rem', fontSize: '0.9rem' }}>{t}</span>)}
          </div>
        </div>
      </section>

      <ProcessTimelineSection lang={lang} />
    </main>
  );
}

function ContactPage({ lang }) {
  return (
    <main style={{ paddingTop: '8rem' }}>
      <section className="section" style={{ paddingBlock: '3rem 5rem' }}>
        <div className="container">
          <div className="reveal in">
            <div className="eyebrow">{lang === 'ar' ? 'تواصل' : 'Contact'}</div>
            <h1 className="sec-head__title" style={{ fontSize: 'clamp(3rem, 8vw, 7rem)', marginTop: '1rem' }}>
              {lang === 'ar' ? <>هلا <span className="italic">حياك</span>.</> : <>Say <span className="italic">hello</span>.</>}
            </h1>
          </div>
          <div className="reveal" style={{ marginTop: '3rem', display: 'grid', gridTemplateColumns: '1fr 1fr', gap: '3rem' }}>
            <form onSubmit={(e) => { e.preventDefault(); alert(lang === 'ar' ? 'تم الإرسال!' : 'Sent!'); }}>
              <div style={{ display: 'grid', gridTemplateColumns: '1fr 1fr', gap: '1rem' }}>
                <div className="form-row"><label>{lang === 'ar' ? 'الاسم' : 'Name'}</label><input required /></div>
                <div className="form-row"><label>{lang === 'ar' ? 'الإيميل' : 'Email'}</label><input type="email" required /></div>
              </div>
              <div className="form-row"><label>{lang === 'ar' ? 'الموضوع' : 'Subject'}</label><input /></div>
              <div className="form-row"><label>{lang === 'ar' ? 'الرسالة' : 'Message'}</label><textarea rows="6" required></textarea></div>
              <Magnet><button className="btn btn-primary" type="submit">{lang === 'ar' ? 'إرسال' : 'Send'} <span className="arrow">→</span></button></Magnet>
            </form>
            <div>
              {[
                { icon: '✉', label: lang === 'ar' ? 'الإيميل' : 'Email', val: 'hello@abobakr.studio' },
                { icon: '◷', label: lang === 'ar' ? 'الواتساب' : 'WhatsApp', val: '+966 5X XXX XXXX' },
                { icon: '◉', label: lang === 'ar' ? 'الموقع' : 'Location', val: lang === 'ar' ? 'الرياض، السعودية' : 'Riyadh, KSA' },
                { icon: '⏱', label: lang === 'ar' ? 'وقت الرد' : 'Reply time', val: lang === 'ar' ? 'خلال ساعتين' : 'Within 2 hours' },
              ].map((c, i) => (
                <div key={i} style={{ borderBottom: '1px solid var(--clr-border)', padding: '1.4rem 0', display: 'flex', alignItems: 'center', gap: '1.2rem' }}>
                  <span style={{ width: 44, height: 44, borderRadius: '50%', background: 'var(--clr-surface)', border: '1px solid var(--clr-border)', display: 'grid', placeItems: 'center', color: 'var(--clr-accent)', fontFamily: 'var(--font-display)' }}>{c.icon}</span>
                  <div>
                    <div className="text-muted" style={{ fontFamily: 'var(--font-mono)', fontSize: '0.7rem', letterSpacing: '0.12em', textTransform: 'uppercase' }}>{c.label}</div>
                    <div style={{ fontSize: '1.05rem', marginTop: '0.2rem' }}>{c.val}</div>
                  </div>
                </div>
              ))}
              <div style={{ marginTop: '2rem' }}>
                <div className="eyebrow" style={{ marginBottom: '1rem' }}>{lang === 'ar' ? 'سوشيال' : 'Social'}</div>
                <div style={{ display: 'flex', gap: '0.5rem' }}>
                  {['Instagram', 'Behance', 'YouTube', 'TikTok', 'X'].map((s) => (
                    <Magnet key={s}><button className="btn btn-outline btn-sm">{s}</button></Magnet>
                  ))}
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
  );
}

Object.assign(window, { ShopPage, OrderPage, PricingCalculator, AboutPage, ContactPage });
