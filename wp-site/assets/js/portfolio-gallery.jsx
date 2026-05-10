/* AboBakr — Portfolio archive, Single project, Gallery, Videos pages */

function PortfolioArchive({ lang, openProject }) {
  const [filter, setFilter] = useState('all');
  const [view, setView] = useState('bento'); // bento | masonry | list
  const items = useMemo(() => {
    const all = window.SITE_DATA.portfolio;
    return filter === 'all' ? all : all.filter((p) => p.cat === filter);
  }, [filter]);
  const filters = window.SITE_DATA.filters;

  return (
    <main style={{ paddingTop: '8rem' }}>
      <section className="section" style={{ paddingBlock: '3rem 5rem' }}>
        <div className="container">
          <div className="reveal in">
            <div className="eyebrow">{lang === 'ar' ? 'الأرشيف الكامل' : 'Full archive'}</div>
            <h1 className="sec-head__title" style={{ fontSize: 'clamp(3rem, 8vw, 7rem)', marginTop: '1rem', marginBottom: '1rem' }}>
              {lang === 'ar' ? <>كل <span className="italic">الأعمال</span></> : <>All the <span className="italic">work</span></>}
            </h1>
            <p style={{ color: 'var(--clr-text-2)', fontSize: '1.1rem', maxWidth: 540 }}>
              {lang === 'ar' ? '٢٤ مشروعاً منذ ٢٠١٨. فلتر، شاهد، تواصل.' : '24 projects since 2018. Filter, browse, reach out.'}
            </p>
          </div>
          <div style={{ marginTop: '3rem', display: 'flex', justifyContent: 'space-between', alignItems: 'center', flexWrap: 'wrap', gap: '1rem' }}>
            <div className="filter-row" style={{ marginBottom: 0 }}>
              {filters.map((f) => (
                <button key={f.id} className={`filter-chip ${filter === f.id ? 'active' : ''}`} onClick={() => setFilter(f.id)}>
                  {lang === 'ar' ? f.labelAr : f.labelEn}
                  <span className="count">{f.count}</span>
                </button>
              ))}
            </div>
            <div className="view-toggle">
              <button className={view === 'bento' ? 'active' : ''} onClick={() => setView('bento')} aria-label="bento" data-cursor-label="bento">
                <svg width="14" height="14" viewBox="0 0 16 16" fill="currentColor"><rect x="1" y="1" width="6" height="9" rx="1"/><rect x="9" y="1" width="6" height="5" rx="1"/><rect x="1" y="12" width="14" height="3" rx="1"/><rect x="9" y="8" width="6" height="7" rx="1"/></svg>
              </button>
              <button className={view === 'masonry' ? 'active' : ''} onClick={() => setView('masonry')} aria-label="grid" data-cursor-label="grid">
                <svg width="14" height="14" viewBox="0 0 16 16" fill="currentColor"><rect x="1" y="1" width="6" height="6" rx="1"/><rect x="9" y="1" width="6" height="6" rx="1"/><rect x="1" y="9" width="6" height="6" rx="1"/><rect x="9" y="9" width="6" height="6" rx="1"/></svg>
              </button>
              <button className={view === 'list' ? 'active' : ''} onClick={() => setView('list')} aria-label="list" data-cursor-label="list">
                <svg width="14" height="14" viewBox="0 0 16 16" fill="currentColor"><rect x="1" y="2" width="14" height="2" rx="1"/><rect x="1" y="7" width="14" height="2" rx="1"/><rect x="1" y="12" width="14" height="2" rx="1"/></svg>
              </button>
            </div>
          </div>

          {view === 'bento' && (
            <div className="bento" style={{ marginTop: '2rem' }}>
              {items.map((p) => (
                <button key={p.id} className={`bento__cell span-c-${p.span_c} span-r-${p.span_r} ${p.isVideo ? 'bento__cell--video' : ''}`} onClick={() => openProject(p.id)} data-cursor-label={lang === 'ar' ? 'افتح' : 'open'}>
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
          )}

          {view === 'masonry' && (
            <div style={{ marginTop: '2rem', display: 'grid', gridTemplateColumns: 'repeat(3, 1fr)', gap: '1rem' }}>
              {items.map((p) => (
                <button key={p.id} className="prod" onClick={() => openProject(p.id)} style={{ padding: 0, textAlign: 'start', display: 'flex', flexDirection: 'column' }} data-cursor-label={lang === 'ar' ? 'افتح' : 'open'}>
                  <div className="prod__media" style={{ ...placeholderBg(p), aspectRatio: '4/5' }}>
                    {p.isVideo && (
                      <div style={{ position: 'absolute', top: '0.8rem', insetInlineEnd: '0.8rem', width: 36, height: 36, borderRadius: '50%', background: 'rgba(0,0,0,0.5)', backdropFilter: 'blur(8px)', display: 'grid', placeItems: 'center', color: '#fff', fontSize: '0.7rem' }}>▶</div>
                    )}
                  </div>
                  <div className="prod__body">
                    <span className="prod__cat">{lang === 'ar' ? p.catLabelAr : p.catLabelEn} · {p.year}</span>
                    <h3 className="prod__title" style={{ fontFamily: 'var(--font-display)', fontStyle: 'italic', fontSize: '1.5rem' }}>{lang === 'ar' ? p.titleAr : p.titleEn}</h3>
                    <div className="prod__row"><span className="text-muted" style={{ fontSize: '0.8rem' }}>{p.client}</span><span className="text-accent">↗</span></div>
                  </div>
                </button>
              ))}
            </div>
          )}

          {view === 'list' && (
            <div style={{ marginTop: '2rem', borderTop: '1px solid var(--clr-border)' }}>
              {items.map((p, i) => (
                <button key={p.id} onClick={() => openProject(p.id)} className="reveal in" style={{ display: 'grid', gridTemplateColumns: '60px 1.5fr 1fr 0.6fr 50px', alignItems: 'center', gap: '1.5rem', padding: '1.4rem 0.6rem', borderBottom: '1px solid var(--clr-border)', textAlign: 'start', width: '100%', transition: 'background 0.3s var(--ease)' }} onMouseEnter={(e) => e.currentTarget.style.background = 'var(--clr-bg-2)'} onMouseLeave={(e) => e.currentTarget.style.background = 'transparent'} data-cursor-label={lang === 'ar' ? 'افتح' : 'open'}>
                  <span className="mono" style={{ color: 'var(--clr-text-muted)', fontSize: '0.8rem' }}>{String(i + 1).padStart(2, '0')}</span>
                  <span style={{ fontFamily: 'var(--font-display)', fontStyle: 'italic', fontSize: '1.5rem' }}>{lang === 'ar' ? p.titleAr : p.titleEn}</span>
                  <span className="text-2" style={{ fontSize: '0.9rem' }}>{lang === 'ar' ? p.catLabelAr : p.catLabelEn}</span>
                  <span className="mono text-muted" style={{ fontSize: '0.8rem' }}>{p.year}</span>
                  <span className="text-accent" style={{ fontSize: '1.3rem' }}>↗</span>
                </button>
              ))}
            </div>
          )}
        </div>
      </section>
    </main>
  );
}

function SingleProjectPage({ id, lang, setPage, openLightbox }) {
  const project = window.SITE_DATA.portfolio.find((p) => p.id === id);
  if (!project) return null;
  const galImages = Array.from({ length: 6 }).map((_, i) => ({
    id: `pg${i}`,
    titleAr: project.titleAr,
    titleEn: project.titleEn,
    hue: project.hue + i * 12,
    sat: project.sat,
    light: project.light + (i % 2 ? -3 : 3),
    source: 'portfolio',
  }));
  return (
    <main style={{ paddingTop: '7rem' }}>
      <section style={{ paddingBlock: '2rem' }}>
        <div className="container">
          <button className="btn btn-ghost btn-sm" onClick={() => setPage('portfolio')} style={{ marginBottom: '2rem' }}>
            ← {lang === 'ar' ? 'العودة للأعمال' : 'Back to work'}
          </button>
          <div className="reveal in" style={{ display: 'grid', gridTemplateColumns: '1fr 1fr', gap: '3rem', alignItems: 'end', marginBottom: '3rem' }}>
            <div>
              <div className="eyebrow">{lang === 'ar' ? project.catLabelAr : project.catLabelEn} · {project.year}</div>
              <h1 className="sec-head__title" style={{ fontSize: 'clamp(2.5rem, 6vw, 5.5rem)', marginTop: '1rem' }}>
                {lang === 'ar' ? project.titleAr : project.titleEn}
              </h1>
              <p style={{ color: 'var(--clr-text-2)', fontSize: '1.05rem', maxWidth: 480, marginTop: '1rem' }}>
                {lang === 'ar' ? `مشروع تم إنجازه لـ ${project.client}. جمع بين عدة تخصصات حرفية لإنتاج هوية بصرية متكاملة.` : `A project crafted for ${project.client}. Brought together multiple disciplines into one cohesive visual outcome.`}
              </p>
            </div>
            <div style={{ display: 'grid', gridTemplateColumns: 'repeat(2, 1fr)', gap: '0.8rem' }}>
              <div className="about-list-item"><div className="label">{lang === 'ar' ? 'العميل' : 'Client'}</div><div className="val">{project.client}</div></div>
              <div className="about-list-item"><div className="label">{lang === 'ar' ? 'السنة' : 'Year'}</div><div className="val">{project.year}</div></div>
              <div className="about-list-item"><div className="label">{lang === 'ar' ? 'التخصص' : 'Discipline'}</div><div className="val">{lang === 'ar' ? project.catLabelAr : project.catLabelEn}</div></div>
              <div className="about-list-item"><div className="label">{lang === 'ar' ? 'الأدوات' : 'Tools'}</div><div className="val">Adobe · Camera</div></div>
            </div>
          </div>
          <div className="reveal in" style={{ aspectRatio: '16/9', borderRadius: 'var(--radius-xl)', overflow: 'hidden', border: '1px solid var(--clr-border-light)', ...placeholderBg(project), marginBottom: '3rem' }}>
            {project.isVideo && (
              <div style={{ width: '100%', height: '100%', display: 'grid', placeItems: 'center' }}>
                <button className="btn btn-primary btn-lg" data-cursor-label={lang === 'ar' ? 'تشغيل' : 'play'}>▶ {lang === 'ar' ? 'تشغيل الفيلم' : 'Play film'}</button>
              </div>
            )}
          </div>

          <div className="reveal" style={{ display: 'grid', gridTemplateColumns: '1fr 1fr', gap: '3rem', marginBottom: '3rem' }}>
            <div>
              <div className="eyebrow">{lang === 'ar' ? 'التحدي' : 'Challenge'}</div>
              <p style={{ marginTop: '1rem', fontSize: '1.05rem', lineHeight: 1.6, color: 'var(--clr-text-2)' }}>
                {lang === 'ar'
                  ? 'العميل أراد هوية بصرية تنحاز للأصل لكن تتنفس حداثياً. التحدي كان موازنة بين الطين الترابي والحس المعاصر دون أن نسقط في النوستالجيا.'
                  : 'The client wanted an identity loyal to roots but breathing modern. The challenge was balancing earthy clay with contemporary feeling without falling into nostalgia.'}
              </p>
            </div>
            <div>
              <div className="eyebrow">{lang === 'ar' ? 'الحل' : 'Solution'}</div>
              <p style={{ marginTop: '1rem', fontSize: '1.05rem', lineHeight: 1.6, color: 'var(--clr-text-2)' }}>
                {lang === 'ar'
                  ? 'نظام بصري قائم على رمز واحد قابل للتحوّل، مع لوحة ألوان من الترابي والذهبي، وطباعة تجمع بين خط عربي معاصر وخط لاتيني هادئ.'
                  : 'A visual system built around a single transformable mark, with an earthy + gold palette, and typography pairing a contemporary Arabic with a quiet Latin counterpart.'}
              </p>
            </div>
          </div>

          <div className="reveal" style={{ display: 'grid', gridTemplateColumns: 'repeat(12, 1fr)', gridAutoRows: '120px', gap: '0.8rem' }}>
            {galImages.map((g, i) => {
              const sizes = [
                { c: 8, r: 4 }, { c: 4, r: 2 }, { c: 4, r: 2 },
                { c: 6, r: 3 }, { c: 6, r: 3 }, { c: 12, r: 4 },
              ];
              const sz = sizes[i] || { c: 4, r: 2 };
              return (
                <button key={g.id} onClick={() => openLightbox(galImages, i)} style={{ gridColumn: `span ${sz.c}`, gridRow: `span ${sz.r}`, borderRadius: 'var(--radius-lg)', overflow: 'hidden', border: '1px solid var(--clr-border)', padding: 0, position: 'relative' }} className="gal-item" data-cursor-label={lang === 'ar' ? 'تكبير' : 'zoom'}>
                  <div className="gal-item__img" style={{ ...placeholderBg(g), height: '100%' }}></div>
                  <span className="gal-item__zoom">⊕</span>
                </button>
              );
            })}
          </div>

          <div style={{ marginTop: '5rem', padding: '3rem 2rem', borderRadius: 'var(--radius-xl)', background: 'var(--clr-surface)', border: '1px solid var(--clr-border)', textAlign: 'center' }}>
            <h3 className="sec-head__title" style={{ fontSize: 'clamp(1.6rem, 3vw, 2.6rem)', marginBottom: '1rem' }}>
              {lang === 'ar' ? <>أعجبك؟ <span className="italic">عندي مساحة لمشروعك.</span></> : <>Like this? <span className="italic">I have room for yours.</span></>}
            </h3>
            <Magnet><button className="btn btn-primary" onClick={() => setPage('order')}>{lang === 'ar' ? 'ابدأ الطلب' : 'Start an order'} <span className="arrow">→</span></button></Magnet>
          </div>
        </div>
      </section>
    </main>
  );
}

function GalleryPage({ lang, openLightbox }) {
  const all = window.SITE_DATA.gallery;
  const [src, setSrc] = useState('all');
  const [view, setView] = useState('masonry');
  const items = useMemo(() => src === 'all' ? all : all.filter((g) => g.source === src), [src]);
  const sources = [
    { id: 'all', ar: 'الكل', en: 'All' },
    { id: 'portfolio', ar: 'بورتفوليو', en: 'Portfolio' },
    { id: 'product', ar: 'منتجات', en: 'Products' },
    { id: 'post', ar: 'مدونة', en: 'Blog' },
  ];

  return (
    <main style={{ paddingTop: '8rem' }}>
      <section className="section" style={{ paddingBlock: '3rem 5rem' }}>
        <div className="container">
          <div className="reveal in">
            <div className="eyebrow">{lang === 'ar' ? 'كل الصور' : 'All images'}</div>
            <h1 className="sec-head__title" style={{ fontSize: 'clamp(3rem, 8vw, 7rem)', marginTop: '1rem' }}>
              {lang === 'ar' ? <>المعرض <span className="italic">كاملاً</span></> : <>The full <span className="italic">gallery</span></>}
            </h1>
            <p className="text-2" style={{ marginTop: '1rem', maxWidth: 540 }}>
              {lang === 'ar' ? 'صور من البورتفوليو، المنتجات، المدونة — في مكان واحد.' : 'Images from portfolio, products, and journal — in one place.'}
            </p>
          </div>
          <div style={{ marginTop: '3rem', display: 'flex', justifyContent: 'space-between', alignItems: 'center', gap: '1rem', flexWrap: 'wrap' }}>
            <div className="filter-row" style={{ marginBottom: 0 }}>
              {sources.map((s) => (
                <button key={s.id} className={`filter-chip ${src === s.id ? 'active' : ''}`} onClick={() => setSrc(s.id)}>
                  {lang === 'ar' ? s.ar : s.en}
                </button>
              ))}
            </div>
            <div className="view-toggle">
              <button className={view === 'masonry' ? 'active' : ''} onClick={() => setView('masonry')} data-cursor-label="masonry">
                <svg width="14" height="14" viewBox="0 0 16 16" fill="currentColor"><rect x="1" y="1" width="6" height="9" rx="1"/><rect x="9" y="1" width="6" height="6" rx="1"/><rect x="1" y="12" width="6" height="3" rx="1"/><rect x="9" y="9" width="6" height="6" rx="1"/></svg>
              </button>
              <button className={view === 'grid' ? 'active' : ''} onClick={() => setView('grid')} data-cursor-label="grid">
                <svg width="14" height="14" viewBox="0 0 16 16" fill="currentColor"><rect x="1" y="1" width="6" height="6" rx="1"/><rect x="9" y="1" width="6" height="6" rx="1"/><rect x="1" y="9" width="6" height="6" rx="1"/><rect x="9" y="9" width="6" height="6" rx="1"/></svg>
              </button>
            </div>
          </div>
          <div className={`reveal in ${view === 'grid' ? 'masonry masonry--grid' : 'masonry'}`} style={{ marginTop: '2rem' }}>
            {items.map((g, i) => {
              const aspect = g.w && g.h ? g.w / g.h : 1;
              const heights = view === 'masonry' ? [220, 280, 200, 320, 240, 360, 220, 280, 240, 300] : null;
              return (
                <button key={g.id} className="gal-item" onClick={() => openLightbox(items, i)} style={{ width: '100%', padding: 0, overflow: 'hidden' }} data-cursor-label={lang === 'ar' ? 'تكبير' : 'zoom'}>
                  <div className="gal-item__img" style={{ ...placeholderBg({ hue: 25 + i * 17, sat: 14, light: 18 }), height: heights ? `${heights[i % heights.length]}px` : '100%', aspectRatio: heights ? 'auto' : aspect }}></div>
                  <span className={`gal-item__badge ${g.source}`}>{g.source}</span>
                  <span className="gal-item__zoom">⊕</span>
                </button>
              );
            })}
          </div>
          <div style={{ marginTop: '3rem', textAlign: 'center' }}>
            <Magnet><button className="btn btn-outline">{lang === 'ar' ? 'حمّل المزيد' : 'Load more'} ↓</button></Magnet>
          </div>
        </div>
      </section>
    </main>
  );
}

function VideosPage({ lang }) {
  const vids = [...window.SITE_DATA.videoSection, ...window.SITE_DATA.videoSection];
  const [ratio, setRatio] = useState('all');
  const filtered = ratio === 'all' ? vids : vids.filter((v) => v.ratio === ratio);
  const ratios = [
    { id: 'all', ar: 'الكل', en: 'All' },
    { id: '16/9', ar: 'أفقي', en: 'Landscape' },
    { id: '9/16', ar: 'رأسي', en: 'Portrait' },
    { id: '1/1', ar: 'مربع', en: 'Square' },
  ];
  return (
    <main style={{ paddingTop: '8rem' }}>
      <section className="section" style={{ paddingBlock: '3rem 5rem' }}>
        <div className="container">
          <div className="reveal in">
            <div className="eyebrow">{lang === 'ar' ? 'فيديو' : 'Motion'}</div>
            <h1 className="sec-head__title" style={{ fontSize: 'clamp(3rem, 8vw, 7rem)', marginTop: '1rem' }}>
              {lang === 'ar' ? <>كل <span className="italic">الفيديو</span></> : <>All the <span className="italic">videos</span></>}
            </h1>
          </div>
          <div className="filter-row" style={{ marginTop: '2rem' }}>
            {ratios.map((r) => (
              <button key={r.id} className={`filter-chip ${ratio === r.id ? 'active' : ''}`} onClick={() => setRatio(r.id)}>
                {lang === 'ar' ? r.ar : r.en}
              </button>
            ))}
          </div>
          <div style={{ display: 'grid', gridTemplateColumns: 'repeat(3, 1fr)', gap: '0.8rem', marginTop: '1.5rem' }}>
            {filtered.map((v, i) => (
              <div key={i} className="bento__cell bento__cell--video" style={{ aspectRatio: v.ratio.replace('/', '/') }} data-cursor-label={lang === 'ar' ? 'تشغيل' : 'play'}>
                <div className="bento__cell-img" style={placeholderBg({ hue: 200 + i * 18, sat: 12, light: 14 })}></div>
                <div className="bento__cell-overlay"></div>
                <div style={{ position: 'absolute', inset: 0, display: 'grid', placeItems: 'center', zIndex: 2 }}>
                  <div style={{ width: 56, height: 56, borderRadius: '50%', background: 'rgba(0,0,0,0.6)', backdropFilter: 'blur(8px)', display: 'grid', placeItems: 'center', color: 'var(--clr-accent)' }}>▶</div>
                </div>
                <div className="bento__cell-meta">
                  <div className="bento__cell-meta-l">
                    <span className="bento__cell-tag">{v.ratio} · {v.duration}</span>
                    <h3>{lang === 'ar' ? v.titleAr : v.titleEn}</h3>
                  </div>
                </div>
              </div>
            ))}
          </div>
        </div>
      </section>
    </main>
  );
}

/* ─── Lightbox component ─── */
function Lightbox({ open, items, index, onClose, onPrev, onNext, lang }) {
  useEffect(() => {
    if (!open) return;
    const onKey = (e) => {
      if (e.key === 'Escape') onClose();
      if (e.key === 'ArrowLeft') onPrev();
      if (e.key === 'ArrowRight') onNext();
    };
    window.addEventListener('keydown', onKey);
    return () => window.removeEventListener('keydown', onKey);
  }, [open, onClose, onPrev, onNext]);
  if (!items || items.length === 0) return null;
  const item = items[index];
  return (
    <div className={`lightbox ${open ? 'open' : ''}`} onClick={(e) => { if (e.target === e.currentTarget) onClose(); }}>
      <button className="lightbox__close" onClick={onClose} data-cursor-label={lang === 'ar' ? 'إغلاق' : 'close'}>✕</button>
      <button className="lightbox__prev" onClick={onPrev} data-cursor-label={lang === 'ar' ? 'سابق' : 'prev'}>‹</button>
      <button className="lightbox__next" onClick={onNext} data-cursor-label={lang === 'ar' ? 'تالي' : 'next'}>›</button>
      <div className="lightbox__stage" data-cursor="drag" data-cursor-label={lang === 'ar' ? 'اسحب' : 'drag'}>
        <div style={{ ...placeholderBg(item || {}), width: '70vw', maxWidth: 900, aspectRatio: '4/3' }}></div>
        <div className="lightbox__caption">
          <div>
            <div style={{ fontWeight: 500 }}>{item && (lang === 'ar' ? item.titleAr : item.titleEn)}</div>
            <div className="lightbox__counter">{index + 1} / {items.length}</div>
          </div>
          {item && item.source && <span className={`gal-item__badge ${item.source}`} style={{ position: 'static' }}>{item.source}</span>}
        </div>
      </div>
    </div>
  );
}

Object.assign(window, { PortfolioArchive, SingleProjectPage, GalleryPage, VideosPage, Lightbox });
