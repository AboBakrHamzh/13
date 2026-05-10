/* AboBakr — Home page sections */

function HeroVideoReel({ lang, soundOn, sound }) {
  const states = window.SITE_DATA.hero.states;
  const [active, setActive] = useState(0);
  const [paused, setPaused] = useState(false);
  const STATE_DUR = 5000;
  useEffect(() => {
    if (paused) return;
    const t = setTimeout(() => {
      setActive((a) => (a + 1) % states.length);
      if (soundOn) sound.tick();
    }, STATE_DUR);
    return () => clearTimeout(t);
  }, [active, paused, soundOn]);

  const current = states[active];
  return (
    <div className="hero__reel" onMouseEnter={() => setPaused(true)} onMouseLeave={() => setPaused(false)}>
      <div className="hero__reel-stage">
        {states.map((s, i) => (
          <div key={s.id} className="hero__reel-frame" data-active={i === active} style={{ background: s.bgGrad }}>
            <div style={{ textAlign: 'center', padding: '2rem' }}>
              <div style={{ fontSize: '5rem', color: 'var(--clr-accent)', fontFamily: 'var(--font-display)', fontStyle: 'italic', lineHeight: 1 }}>{s.symbol}</div>
              <div style={{ marginTop: '1rem', fontFamily: 'var(--font-mono)', fontSize: '0.7rem', letterSpacing: '0.18em', color: 'var(--clr-text-muted)', textTransform: 'uppercase' }}>{s.cardLabel}</div>
              <div style={{ marginTop: '0.6rem', fontFamily: 'var(--font-display)', fontStyle: 'italic', fontSize: '2.4rem', color: 'var(--clr-text)' }}>
                {lang === 'ar' ? `${s.titleAr} ${s.accentAr}` : `${s.titleEn} ${s.accentEn}`}
              </div>
            </div>
          </div>
        ))}
      </div>
      <div className="hero__reel-meta">
        <span>{lang === 'ar' ? `${active + 1} / ${states.length} — ${current.labelAr}` : `${String(active + 1).padStart(2, '0')} / ${String(states.length).padStart(2, '0')} — ${current.labelEn}`}</span>
        <span>SHOWREEL · 2026</span>
      </div>
      <div className="hero__reel-scrubber">
        {states.map((s, i) => (
          <div
            key={s.id}
            className={`hero__reel-scrubber-track ${i === active ? 'active' : ''} ${i < active ? 'done' : ''}`}
            onClick={() => setActive(i)}
            data-cursor-label={lang === 'ar' ? s.labelAr : s.labelEn}
          >
            <div className="fill" />
          </div>
        ))}
      </div>
    </div>
  );
}

function Hero({ lang, setPage, soundOn, sound }) {
  const orbRef = useRef(null);
  useEffect(() => {
    const onMove = (e) => {
      const x = (e.clientX / window.innerWidth - 0.5) * 30;
      const y = (e.clientY / window.innerHeight - 0.5) * 30;
      if (orbRef.current) orbRef.current.style.transform = `translate(${x}px, ${y}px)`;
    };
    window.addEventListener('mousemove', onMove);
    return () => window.removeEventListener('mousemove', onMove);
  }, []);

  return (
    <section className="hero">
      <div className="hero__bg">
        <div className="hero__bg-grid"></div>
        <div className="hero__orb" ref={orbRef}></div>
        <div className="hero__orb-2"></div>
      </div>
      <div className="container hero__inner">
        <div>
          <div className="eyebrow reveal in" style={{ marginBottom: '1.5rem' }}>
            {lang === 'ar' ? 'مصمم متعدد التخصصات · الرياض' : 'Multidisciplinary maker · Riyadh'}
          </div>
          {lang === 'ar' ? (
            <h1 className="hero__title h-display-ar">
              <span className="stack">خمس حِرف،</span>
              <span className="stack indent">صوت <span className="accent">واحد</span></span>
            </h1>
          ) : (
            <h1 className="hero__title h-display">
              <span className="stack">Five crafts,</span>
              <span className="stack indent"><span className="accent">one</span> voice</span>
            </h1>
          )}
          <p className="hero__sub">
            {lang === 'ar'
              ? 'تصميم، ليزر، فيديو، زهور، وضوء كاميرا — خامات مختلفة، حسّ بصري واحد.'
              : 'Design, laser, film, florals, and camera light — five disciplines, one sensibility.'}
          </p>
          <div className="hero__cta-row">
            <Magnet><button className="btn btn-primary btn-lg" onClick={() => { setPage('portfolio'); soundOn && sound.click(); }}>
              {lang === 'ar' ? 'استكشف الأعمال' : 'Explore work'} <span className="arrow">→</span>
            </button></Magnet>
            <Magnet><button className="btn btn-outline btn-lg" onClick={() => { setPage('order'); soundOn && sound.click(); }}>
              {lang === 'ar' ? 'ابدأ مشروعاً' : 'Start a project'}
            </button></Magnet>
          </div>
        </div>
        <div className="hero__side">
          <HeroVideoReel lang={lang} soundOn={soundOn} sound={sound} />
          <div className="hero__stats">
            <div className="hero__stat">
              <div className="hero__stat-value">120+</div>
              <div className="hero__stat-label">{lang === 'ar' ? 'مشروعاً منشوراً' : 'Projects shipped'}</div>
            </div>
            <div className="hero__stat">
              <div className="hero__stat-value">8</div>
              <div className="hero__stat-label">{lang === 'ar' ? 'سنوات حرفة' : 'Years crafting'}</div>
            </div>
          </div>
        </div>
      </div>
      <div className="hero__scroll-hint">
        <span>{lang === 'ar' ? 'مرّر' : 'scroll'}</span>
        <div className="line"></div>
      </div>
    </section>
  );
}

function IdentityStrip({ lang, setPage }) {
  const t = useT();
  return (
    <section className="identity" data-screen-label="identity">
      <div className="identity__grid">
        {window.SITE_DATA.specialties.map((s, i) => (
          <button key={s.num} className="identity__item" onClick={() => setPage('portfolio')} data-cursor-label={lang === 'ar' ? s.titleAr : s.titleEn}>
            <span className="identity__num">— {s.num}</span>
            <h3 className={`identity__title ${lang === 'ar' ? 'identity__title-ar' : ''}`}>
              <span style={{ color: 'var(--clr-accent)', marginInlineEnd: '0.6rem', fontFamily: 'var(--font-display)', fontStyle: 'italic' }}>{s.icon}</span>
              {lang === 'ar' ? s.titleAr : s.titleEn}
            </h3>
            <div className="identity__desc">{lang === 'ar' ? s.descAr : s.descEn}</div>
            <span className="identity__arrow">↗</span>
          </button>
        ))}
      </div>
    </section>
  );
}

function SkillsMarquee({ lang }) {
  const items = window.SITE_DATA.marquee;
  const Repeat = () => items.map((it, i) => (
    <span key={i} className={`marquee__item ${lang === 'ar' ? 'marquee__item-ar' : ''}`}>
      <span className="dot" />
      {lang === 'ar' ? it.ar : it.en}
    </span>
  ));
  return (
    <div className="marquee">
      <div className="marquee__track"><Repeat /></div>
      <div className="marquee__track" aria-hidden="true"><Repeat /></div>
    </div>
  );
}

function PortfolioBento({ lang, setPage, openProject, openQuickView }) {
  const t = useT();
  const [filter, setFilter] = useState('all');
  const items = useMemo(() => {
    const all = window.SITE_DATA.portfolio;
    return filter === 'all' ? all : all.filter((p) => p.cat === filter);
  }, [filter]);
  const filters = window.SITE_DATA.filters;

  return (
    <section className="section" data-screen-label="portfolio-grid">
      <div className="container">
        <div className="sec-head reveal">
          <div>
            <div className="eyebrow">{lang === 'ar' ? 'البورتفوليو' : 'Selected work'}</div>
            <h2 className="sec-head__title" style={{ marginTop: '0.7rem' }}>
              {lang === 'ar' ? <>أعمال <span className="italic">تتنفس</span></> : <>Work that <span className="italic">breathes</span></>}
            </h2>
            <p className="sec-head__sub">
              {lang === 'ar' ? 'انتقاء من آخر عامين عبر الخمسة تخصصات.' : 'A curated selection across five disciplines from the last two years.'}
            </p>
          </div>
          <div className="sec-head__aside">
            <Magnet><button className="btn btn-outline" onClick={() => setPage('portfolio')}>
              {lang === 'ar' ? 'كل الأعمال' : 'View all'} <span className="arrow">→</span>
            </button></Magnet>
          </div>
        </div>
        <div className="filter-row reveal">
          {filters.map((f) => (
            <button key={f.id} className={`filter-chip ${filter === f.id ? 'active' : ''}`} onClick={() => setFilter(f.id)}>
              {lang === 'ar' ? f.labelAr : f.labelEn}
              <span className="count">{f.count}</span>
            </button>
          ))}
        </div>
        <div className="bento reveal">
          {items.map((p) => (
            <button
              key={p.id}
              className={`bento__cell span-c-${p.span_c} span-r-${p.span_r} ${p.isVideo ? 'bento__cell--video' : ''}`}
              onClick={() => (openQuickView ? openQuickView(p, p.isVideo ? 'video' : 'project') : openProject(p.id))}
              data-cursor-label={lang === 'ar' ? 'عرض سريع' : 'quick view'}
            >
              <div className="bento__cell-img" style={placeholderBg(p)}></div>
              <div className="bento__cell-overlay"></div>
              <div className="bento__cell-meta">
                <div className="bento__cell-meta-l">
                  <span className="bento__cell-tag">{lang === 'ar' ? p.catLabelAr : p.catLabelEn} · {p.year}</span>
                  <h3>{lang === 'ar' ? p.titleAr : p.titleEn}</h3>
                </div>
                <span className="bento__cell-cta">↗</span>
              </div>
            </button>
          ))}
        </div>
      </div>
    </section>
  );
}

function VideoSectionHome({ lang, setPage, openQuickView }) {
  const vids = window.SITE_DATA.videoSection;
  return (
    <section className="section section--bg-2" data-screen-label="video-section">
      <div className="container">
        <div className="sec-head reveal">
          <div>
            <div className="eyebrow">{lang === 'ar' ? 'فيديو' : 'Motion'}</div>
            <h2 className="sec-head__title" style={{ marginTop: '0.7rem' }}>
              {lang === 'ar' ? <>الحركة <span className="italic">والضوء</span></> : <>Frames in <span className="italic">motion</span></>}
            </h2>
          </div>
          <Magnet><button className="btn btn-ghost" onClick={() => setPage('videos')}>
            {lang === 'ar' ? 'كل الفيديو' : 'All videos'} <span className="arrow">→</span>
          </button></Magnet>
        </div>
        <div className="reveal" style={{ display: 'grid', gridTemplateColumns: 'repeat(12, 1fr)', gridAutoRows: '90px', gap: '0.9rem' }}>
          {vids.map((v, i) => {
            const layouts = [
              { c: 6, r: 4 }, { c: 3, r: 6 }, { c: 3, r: 4 },
              { c: 4, r: 4 }, { c: 4, r: 4 }, { c: 4, r: 4 },
            ];
            const lay = layouts[i] || { c: 4, r: 3 };
            return (
              <div key={v.id} className="bento__cell bento__cell--video" onClick={() => openQuickView && openQuickView({ ...v, hue: 200 + i * 18, sat: 12, light: 14 }, 'video')} style={{ gridColumn: `span ${lay.c}`, gridRow: `span ${lay.r}`, cursor: 'pointer' }} data-cursor-label={lang === 'ar' ? 'عرض سريع' : 'quick view'}>
                <div className="bento__cell-img" style={placeholderBg({ hue: 200 + i * 18, sat: 12, light: 14 })}></div>
                <div className="bento__cell-overlay"></div>
                <div style={{ position: 'absolute', inset: 0, display: 'grid', placeItems: 'center', zIndex: 2 }}>
                  <div style={{ width: 56, height: 56, borderRadius: '50%', background: 'rgba(0,0,0,0.55)', backdropFilter: 'blur(8px)', display: 'grid', placeItems: 'center', color: 'var(--clr-accent)', fontSize: '1rem' }}>▶</div>
                </div>
                <div className="bento__cell-meta">
                  <div className="bento__cell-meta-l">
                    <span className="bento__cell-tag">{v.ratio} · {v.duration}</span>
                    <h3>{lang === 'ar' ? v.titleAr : v.titleEn}</h3>
                  </div>
                </div>
              </div>
            );
          })}
        </div>
      </div>
    </section>
  );
}

function MediaSectionHome({ lang, setPage, openLightbox }) {
  const items = window.SITE_DATA.gallery.slice(0, 9);
  return (
    <section className="section" data-screen-label="media">
      <div className="container">
        <div className="sec-head reveal">
          <div>
            <div className="eyebrow">{lang === 'ar' ? 'لقطات' : 'Stills'}</div>
            <h2 className="sec-head__title" style={{ marginTop: '0.7rem' }}>
              {lang === 'ar' ? <>إطارات <span className="italic">من اليومي</span></> : <>Frames from <span className="italic">the everyday</span></>}
            </h2>
          </div>
          <Magnet><button className="btn btn-ghost" onClick={() => setPage('gallery')}>
            {lang === 'ar' ? 'كل المعرض' : 'All gallery'} <span className="arrow">→</span>
          </button></Magnet>
        </div>
        <div className="reveal" style={{ display: 'grid', gridTemplateColumns: 'repeat(12, 1fr)', gridAutoRows: '120px', gap: '0.6rem' }}>
          {items.map((g, i) => {
            const sizes = [
              { c: 6, r: 4 }, { c: 3, r: 2 }, { c: 3, r: 2 },
              { c: 3, r: 2 }, { c: 3, r: 2 }, { c: 6, r: 3 },
              { c: 4, r: 2 }, { c: 4, r: 2 }, { c: 4, r: 2 },
            ];
            const sz = sizes[i] || { c: 3, r: 2 };
            return (
              <button
                key={g.id}
                className="gal-item"
                onClick={() => openLightbox(items, i)}
                style={{ gridColumn: `span ${sz.c}`, gridRow: `span ${sz.r}`, padding: 0 }}
                data-cursor-label={lang === 'ar' ? 'عرض' : 'view'}
              >
                <div className="gal-item__img" style={{ ...placeholderBg({ hue: 30 + i * 22, sat: 14, light: 18 }), height: '100%' }}></div>
                <span className={`gal-item__badge ${g.source}`}>{g.source}</span>
                <span className="gal-item__zoom">⊕</span>
              </button>
            );
          })}
        </div>
      </div>
    </section>
  );
}

function ShopPreviewHome({ lang, setPage, addToCart, openQuickView }) {
  const items = window.SITE_DATA.shop.slice(0, 4);
  return (
    <section className="section section--bg-2" data-screen-label="shop-preview">
      <div className="container">
        <div className="sec-head reveal">
          <div>
            <div className="eyebrow">{lang === 'ar' ? 'المتجر' : 'Shop'}</div>
            <h2 className="sec-head__title" style={{ marginTop: '0.7rem' }}>
              {lang === 'ar' ? <>أعمال <span className="italic">تشتري</span></> : <>Things you <span className="italic">can own</span></>}
            </h2>
            <p className="sec-head__sub">{lang === 'ar' ? 'رقمية، مادية، وخدمات.' : 'Digital, physical, services.'}</p>
          </div>
          <Magnet><button className="btn btn-outline" onClick={() => setPage('shop')}>
            {lang === 'ar' ? 'كل المتجر' : 'All shop'} <span className="arrow">→</span>
          </button></Magnet>
        </div>
        <div className="product-grid reveal">
          {items.map((p, i) => (
            <ProductCardV2 key={p.id} p={p} lang={lang} addToCart={addToCart} openQuickView={openQuickView} hue={20 + i * 30} />
          ))}
        </div>
      </div>
    </section>
  );
}

function ProductCard({ p, lang, addToCart, hue = 30 }) {
  const typeLabel = (t) => t === 'digital' ? (lang === 'ar' ? 'رقمي' : 'Digital') : t === 'physical' ? (lang === 'ar' ? 'مادي' : 'Physical') : (lang === 'ar' ? 'خدمة' : 'Service');
  return (
    <article className="prod">
      <div className="prod__media" style={placeholderBg({ hue, sat: 16, light: 18 })}>
        <span className={`prod__type ${p.type}`}>{typeLabel(p.type)}</span>
        <button className="prod__quick" onClick={() => addToCart(p)} aria-label="quick add" data-cursor-label={lang === 'ar' ? 'أضف للسلة' : 'add'}>+</button>
      </div>
      <div className="prod__body">
        <span className="prod__cat">{p.cat}</span>
        <h3 className="prod__title">{lang === 'ar' ? p.titleAr : p.titleEn}</h3>
        <div className="prod__row">
          <div className="prod__price">{fmtSAR(p.price, lang)}<small>{lang === 'ar' ? 'ر.س' : 'SAR'}</small></div>
          <Magnet><button className="btn btn-sm btn-outline" onClick={() => addToCart(p)}>
            {lang === 'ar' ? 'للسلة' : 'Add'}
          </button></Magnet>
        </div>
      </div>
    </article>
  );
}

function AboutTeaser({ lang, setPage }) {
  return (
    <section className="section" data-screen-label="about-teaser">
      <div className="container">
        <div className="reveal" style={{ display: 'grid', gridTemplateColumns: '1fr 1fr', gap: 'clamp(2rem, 5vw, 4rem)', alignItems: 'center' }}>
          <div className="about-portrait" style={{ minHeight: 480, position: 'relative' }}>
            <div className="about-stack">
              <span>RIYADH · KSA</span>
              <span>EST. 2018</span>
            </div>
          </div>
          <div>
            <div className="eyebrow">{lang === 'ar' ? 'تعريف' : 'About'}</div>
            <h2 className="sec-head__title" style={{ marginTop: '0.7rem', marginBottom: '1.2rem' }}>
              {lang === 'ar' ? <>أبني <span className="italic">جسوراً</span> بين الفكرة والمادة.</> : <>I build <span className="italic">bridges</span> between idea and matter.</>}
            </h2>
            <p style={{ color: 'var(--clr-text-2)', fontSize: '1.05rem', marginBottom: '1.5rem' }}>
              {lang === 'ar'
                ? 'منذ ٢٠١٨ أعمل من الرياض، أتنقل بين الأدوبي والليزر والكاميرا. لا أؤمن بالاختصاص الواحد — التخصصات تتغذى من بعض، والحس البصري يصقل نفسه بالتنوع.'
                : 'Working from Riyadh since 2018, moving between Adobe, the laser bed, and the camera. I don\'t believe in one specialty — disciplines feed each other.'}
            </p>
            <div style={{ display: 'flex', gap: '1.5rem', marginBottom: '2rem' }}>
              {[
                { v: '120+', l: lang === 'ar' ? 'مشروع' : 'Projects' },
                { v: '8', l: lang === 'ar' ? 'سنوات' : 'Years' },
                { v: '5', l: lang === 'ar' ? 'تخصصات' : 'Disciplines' },
              ].map((s, i) => (
                <div key={i}>
                  <div className="hero__stat-value">{s.v}</div>
                  <div className="hero__stat-label">{s.l}</div>
                </div>
              ))}
            </div>
            <Magnet><button className="btn btn-primary" onClick={() => setPage('about')}>
              {lang === 'ar' ? 'القصة كاملة' : 'Full story'} <span className="arrow">→</span>
            </button></Magnet>
          </div>
        </div>
      </div>
    </section>
  );
}

function HomePage(props) {
  return (
    <React.Fragment>
      <Hero {...props} />
      <IdentityStrip {...props} />
      <SkillsMarquee {...props} />
      <PortfolioBento {...props} />
      <VideoSectionHome {...props} />
      <MediaSectionHome {...props} />
      <ShopPreviewHome {...props} />
      <ProcessTimelineSection {...props} />
      <TestimonialsSection {...props} />
      <AboutTeaser {...props} />
      <BlogPreviewSection {...props} />
    </React.Fragment>
  );
}

Object.assign(window, { HomePage, Hero, IdentityStrip, SkillsMarquee, PortfolioBento, VideoSectionHome, MediaSectionHome, ShopPreviewHome, ProductCard, AboutTeaser });
