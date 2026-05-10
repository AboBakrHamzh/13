/* AboBakr — Process timeline + Testimonials + Blog preview */

function ProcessTimelineSection({ lang }) {
  const steps = window.SITE_DATA.process;
  const [active, setActive] = useState(0);
  const cur = steps[active];
  return (
    <section className="section" data-screen-label="process">
      <div className="container">
        <div className="sec-head reveal">
          <div>
            <div className="eyebrow">{lang === 'ar' ? 'الطريقة' : 'Method'}</div>
            <h2 className="sec-head__title" style={{ marginTop: '0.7rem' }}>
              {lang === 'ar' ? <>كيف <span className="italic">أشتغل</span></> : <>How I <span className="italic">work</span></>}
            </h2>
          </div>
        </div>
        <div className="process reveal">
          <div className="process__nav">
            {steps.map((s, i) => (
              <button
                key={s.num}
                className={`process__nav-item ${i === active ? 'active' : ''}`}
                onClick={() => setActive(i)}
                data-cursor-label={lang === 'ar' ? s.titleAr : s.titleEn}
              >
                <span className="num">{s.num}</span>
                <span style={{ fontSize: '1.15rem', fontFamily: i === active ? 'var(--font-display)' : 'inherit', fontStyle: i === active ? 'italic' : 'normal' }}>
                  {lang === 'ar' ? s.titleAr : s.titleEn}
                </span>
              </button>
            ))}
          </div>
          <div className="process__panel">
            <div className="process__panel-num">{cur.num}</div>
            <h3 className={`process__panel-title ${lang === 'ar' ? 'process__panel-title-ar' : ''}`}>
              {lang === 'ar' ? cur.titleAr : cur.titleEn}
            </h3>
            <p className="process__panel-body">{lang === 'ar' ? cur.bodyAr : cur.bodyEn}</p>
            <div className="process__deliver">
              {cur.deliver.map((d, i) => <span key={i} className="deliver-chip">{d}</span>)}
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}

function TestimonialsSection({ lang }) {
  const items = window.SITE_DATA.testimonials;
  const [i, setI] = useState(0);
  useEffect(() => {
    const t = setInterval(() => setI((x) => (x + 1) % items.length), 6500);
    return () => clearInterval(t);
  }, []);
  const cur = items[i];
  return (
    <section className="section section--bg-2" data-screen-label="testimonials">
      <div className="container">
        <div className="sec-head reveal">
          <div>
            <div className="eyebrow">{lang === 'ar' ? 'كلمة عملاء' : 'Clients say'}</div>
            <h2 className="sec-head__title" style={{ marginTop: '0.7rem' }}>
              {lang === 'ar' ? <>قالوا <span className="italic">عن العمل</span></> : <>What they <span className="italic">said</span></>}
            </h2>
          </div>
        </div>
        <div className="testi reveal">
          <span className="testi__quote-mark">"</span>
          <div className="testi__slide" key={i}>
            <div>
              <p className={`testi__quote ${lang === 'ar' ? 'testi__quote-ar' : ''}`}>
                {lang === 'ar' ? cur.quoteAr : cur.quoteEn}
              </p>
              <div className="testi__person">
                <div className="testi__avatar">{cur.name.charAt(0)}</div>
                <div>
                  <div className="testi__name">{cur.name}</div>
                  <div className="testi__role">{cur.role}</div>
                </div>
              </div>
            </div>
            <div className="testi__meta">
              <div>{cur.project}</div>
            </div>
          </div>
          <div className="testi__nav">
            <div className="testi__dots">
              {items.map((_, idx) => (
                <button key={idx} className={`testi__dot ${idx === i ? 'active' : ''}`} onClick={() => setI(idx)} aria-label={`testimonial ${idx+1}`} />
              ))}
            </div>
            <div className="testi__arrows">
              <button className="icon-btn" onClick={() => setI((i - 1 + items.length) % items.length)}>‹</button>
              <button className="icon-btn" onClick={() => setI((i + 1) % items.length)}>›</button>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}

function BlogPreviewSection({ lang, setPage }) {
  const items = window.SITE_DATA.blog;
  return (
    <section className="section" data-screen-label="blog">
      <div className="container">
        <div className="sec-head reveal">
          <div>
            <div className="eyebrow">{lang === 'ar' ? 'مقالات' : 'Journal'}</div>
            <h2 className="sec-head__title" style={{ marginTop: '0.7rem' }}>
              {lang === 'ar' ? <>أفكار <span className="italic">مكتوبة</span></> : <>Words I <span className="italic">live by</span></>}
            </h2>
          </div>
        </div>
        <div className="reveal" style={{ display: 'grid', gridTemplateColumns: 'repeat(3, 1fr)', gap: '1rem' }}>
          {items.map((b, i) => (
            <a key={b.id} href="#" className="prod" style={{ padding: 0, textAlign: 'start', display: 'flex', flexDirection: 'column' }} data-cursor-label={lang === 'ar' ? 'اقرأ' : 'read'}>
              <div className="prod__media" style={{ ...placeholderBg({ hue: 30 + i * 50, sat: 14, light: 16 }), aspectRatio: '4/3' }}></div>
              <div className="prod__body">
                <span className="prod__cat">{b.date} · {b.read}</span>
                <h3 className="prod__title" style={{ fontFamily: 'var(--font-display)', fontStyle: 'italic', fontSize: '1.4rem', lineHeight: 1.2 }}>
                  {lang === 'ar' ? b.titleAr : b.titleEn}
                </h3>
              </div>
            </a>
          ))}
        </div>
        <div className="reveal" style={{ marginTop: '5rem', textAlign: 'center', padding: '3rem 1rem', borderTop: '1px solid var(--clr-border)' }}>
          <h3 className="sec-head__title" style={{ fontSize: 'clamp(1.8rem, 4vw, 3.4rem)', marginBottom: '1rem' }}>
            {lang === 'ar' ? <>عندك <span className="italic">فكرة</span>؟</> : <>Got an <span className="italic">idea</span>?</>}
          </h3>
          <p className="text-2" style={{ marginBottom: '1.5rem' }}>
            {lang === 'ar' ? 'لنحوّلها إلى شيء يُرى ويُلمس.' : 'Let\'s turn it into something seen and touched.'}
          </p>
          <Magnet><button className="btn btn-primary btn-lg" onClick={() => setPage('order')}>
            {lang === 'ar' ? 'ابدأ الآن' : 'Start now'} <span className="arrow">→</span>
          </button></Magnet>
        </div>
      </div>
    </section>
  );
}

Object.assign(window, { ProcessTimelineSection, TestimonialsSection, BlogPreviewSection });
