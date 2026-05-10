/* AboBakr — header, footer, search overlay, whatsapp widget, page curtain */

function Header({ page, setPage, lang, setLang, theme, setTheme, openSearch, cartCount, openCart }) {
  const t = useT();
  const [scrolled, setScrolled] = useState(false);
  useEffect(() => {
    const onScroll = () => setScrolled(window.scrollY > 30);
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });
    return () => window.removeEventListener('scroll', onScroll);
  }, []);

  const nav = [
    { id: 'home', ar: 'الرئيسية', en: 'Home' },
    { id: 'portfolio', ar: 'البورتفوليو', en: 'Portfolio' },
    { id: 'gallery', ar: 'المعرض', en: 'Gallery' },
    { id: 'shop', ar: 'المتجر', en: 'Shop' },
    { id: 'about', ar: 'من أنا', en: 'About' },
    { id: 'order', ar: 'اطلب', en: 'Order' },
    { id: 'contact', ar: 'تواصل', en: 'Contact' },
  ];

  return (
    <header className={`site-header ${scrolled ? 'scrolled' : ''}`}>
      <div className="container site-header__inner">
        <a className="brand" data-cursor-label={lang === 'ar' ? 'الرئيسية' : 'home'} onClick={(e) => { e.preventDefault(); setPage('home'); }} href="#">
          <span className="brand-mark">{lang === 'ar' ? 'أ' : 'A'}</span>
          <span>{lang === 'ar' ? 'أبوبكر' : 'AboBakr'}<span style={{ color: 'var(--clr-accent)' }}>.</span></span>
        </a>
        <nav className="nav">
          {nav.map((n) => (
            <a key={n.id} href="#" className={page === n.id ? 'active' : ''} onClick={(e) => { e.preventDefault(); setPage(n.id); }}>
              {lang === 'ar' ? n.ar : n.en}
            </a>
          ))}
        </nav>
        <div className="header-actions">
          <Magnet>
            <button className="icon-btn" data-cursor-label={lang === 'ar' ? 'بحث' : 'search'} onClick={openSearch} aria-label="search">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg>
            </button>
          </Magnet>
          <Magnet>
            <button className="icon-btn" data-cursor-label={lang === 'ar' ? (theme === 'dark' ? 'فاتح' : 'داكن') : (theme === 'dark' ? 'light' : 'dark')} onClick={() => setTheme(theme === 'dark' ? 'light' : 'dark')} aria-label="theme">
              {theme === 'dark' ? (
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2"><circle cx="12" cy="12" r="5"/><path d="M12 1v2m0 18v2M4.2 4.2l1.4 1.4m12.8 12.8 1.4 1.4M1 12h2m18 0h2M4.2 19.8l1.4-1.4M18.4 5.6l1.4-1.4"/></svg>
              ) : (
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
              )}
            </button>
          </Magnet>
          <Magnet>
            <button className="icon-btn" data-cursor-label={lang === 'ar' ? 'السلة' : 'cart'} onClick={openCart || (() => setPage('shop'))} aria-label="cart">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4zM3 6h18M16 10a4 4 0 0 1-8 0"/></svg>
              {cartCount > 0 && <span className="badge">{cartCount}</span>}
            </button>
          </Magnet>
          <div className="lang-switch">
            <button className={lang === 'ar' ? 'active' : ''} onClick={() => setLang('ar')}>AR</button>
            <button className={lang === 'en' ? 'active' : ''} onClick={() => setLang('en')}>EN</button>
          </div>
        </div>
      </div>
    </header>
  );
}

function Footer({ lang, setPage }) {
  const cols = [
    { title: { ar: 'استكشف', en: 'Explore' }, links: [
      { ar: 'البورتفوليو', en: 'Portfolio', page: 'portfolio' },
      { ar: 'المعرض', en: 'Gallery', page: 'gallery' },
      { ar: 'الفيديو', en: 'Videos', page: 'videos' },
      { ar: 'المتجر', en: 'Shop', page: 'shop' },
    ]},
    { title: { ar: 'تعرّف', en: 'About' }, links: [
      { ar: 'من أنا', en: 'About', page: 'about' },
      { ar: 'الطلبات', en: 'Order', page: 'order' },
      { ar: 'تواصل', en: 'Contact', page: 'contact' },
      { ar: 'المدونة', en: 'Journal', page: 'home' },
    ]},
    { title: { ar: 'تابعني', en: 'Follow' }, links: [
      { ar: 'إنستجرام', en: 'Instagram' },
      { ar: 'بيهانس', en: 'Behance' },
      { ar: 'يوتيوب', en: 'YouTube' },
      { ar: 'تيك توك', en: 'TikTok' },
    ]},
  ];
  return (
    <footer className="foot">
      <div className="container">
        <div className="foot__inner">
          <div className="foot__col">
            <div className="foot__brand">{lang === 'ar' ? 'أبوبكر.' : 'AboBakr.'}</div>
            <p className="foot__bio">
              {lang === 'ar'
                ? 'مصمم متعدد التخصصات من الرياض. أعمل على تقاطع التصميم، الفيلم، الحرفة، والضوء.'
                : 'A multidisciplinary maker from Riyadh. I work at the intersection of design, film, craft, and light.'}
            </p>
            <div className="foot__social">
              {['IG', 'Be', 'YT', 'TT', 'X'].map((s) => (
                <Magnet key={s}><button className="icon-btn" style={{ fontFamily: 'var(--font-mono)', fontSize: '0.7rem' }}>{s}</button></Magnet>
              ))}
            </div>
          </div>
          {cols.map((c, i) => (
            <div className="foot__col" key={i}>
              <h4>{lang === 'ar' ? c.title.ar : c.title.en}</h4>
              <ul>
                {c.links.map((l, j) => (
                  <li key={j}>
                    <a href="#" onClick={(e) => { e.preventDefault(); if (l.page) setPage(l.page); }}>
                      {lang === 'ar' ? l.ar : l.en}
                    </a>
                  </li>
                ))}
              </ul>
            </div>
          ))}
        </div>
        <div className="foot__bottom">
          <span>© 2026 ABOBAKR · RIYADH</span>
          <span>BUILT WITH CARE · V1.0</span>
        </div>
      </div>
    </footer>
  );
}

/* ─── Page transition curtain ─── */
function PageCurtain({ phase, lang }) {
  return (
    <div className={`page-curtain ${phase === 'in' ? 'in' : phase === 'out' ? 'out' : ''}`}>
      <div className="page-curtain__mark">
        {lang === 'ar' ? 'أبوبكر' : 'AboBakr.'}
      </div>
    </div>
  );
}

/* ─── AI search overlay ─── */
function SearchOverlay({ open, onClose, lang, setPage, openProject }) {
  const t = useT();
  const [q, setQ] = useState('');
  const [aiThinking, setAiThinking] = useState(false);
  const [aiAnswer, setAiAnswer] = useState('');
  const [sel, setSel] = useState(0);
  const inputRef = useRef(null);
  useEffect(() => {
    if (open) setTimeout(() => inputRef.current && inputRef.current.focus(), 100);
    else { setQ(''); setAiAnswer(''); }
  }, [open]);

  const data = window.SITE_DATA.searchIndex;
  const ql = q.trim().toLowerCase();
  const filtered = ql ? data.filter((d) => {
    const a = (d.titleAr || '').toLowerCase();
    const e = (d.titleEn || '').toLowerCase();
    const c = (d.cat || '').toLowerCase();
    return a.includes(ql) || e.includes(ql) || c.includes(ql);
  }) : data.slice(0, 6);

  const grouped = useMemo(() => {
    const g = {};
    filtered.forEach((d) => { (g[d.type] = g[d.type] || []).push(d); });
    return g;
  }, [filtered]);

  const askAI = async () => {
    if (!q.trim()) return;
    setAiThinking(true);
    setAiAnswer('');
    try {
      const sys = lang === 'ar'
        ? 'أنت مساعد لموقع أبوبكر — مصمم سعودي متعدد التخصصات. أجب بإيجاز شديد (جملة أو جملتين فقط) بالعربية بناءً على بيانات الأعمال المرفقة. وجّه المستخدم لصفحة مناسبة في الموقع.'
        : 'You are an assistant for AboBakr — a Saudi multidisciplinary maker. Answer briefly (1-2 sentences) in English based on the works data. Suggest the right page.';
      const works = window.SITE_DATA.searchIndex.map((d) => `${lang === 'ar' ? d.titleAr : d.titleEn} (${d.type}, ${d.cat})`).join(' | ');
      const text = await window.claude.complete({
        messages: [{
          role: 'user',
          content: `${sys}\n\nWorks data: ${works}\n\nUser question: ${q}`
        }]
      });
      setAiAnswer(text || '');
    } catch (e) {
      setAiAnswer(lang === 'ar' ? 'لم أستطع الإجابة الآن، جرّب البحث المباشر بالأسفل.' : 'Could not answer now — try the direct results below.');
    }
    setAiThinking(false);
  };

  const onKeyDown = (e) => {
    if (e.key === 'Enter') {
      if (e.shiftKey || e.metaKey || e.ctrlKey) { askAI(); return; }
      const all = Object.values(grouped).flat();
      const item = all[sel] || all[0];
      if (item) {
        if (item.page === 'single-portfolio') openProject(item.id);
        else setPage(item.page);
        onClose();
      }
    }
    if (e.key === 'ArrowDown') { e.preventDefault(); setSel((s) => s + 1); }
    if (e.key === 'ArrowUp') { e.preventDefault(); setSel((s) => Math.max(0, s - 1)); }
    if (e.key === 'Escape') onClose();
  };

  return (
    <div className={`search-overlay ${open ? 'open' : ''}`} onClick={(e) => { if (e.target === e.currentTarget) onClose(); }}>
      <div className="search-box">
        <div className="search-input-row">
          <span className="search-icon">⌖</span>
          <input
            ref={inputRef}
            className="search-input"
            placeholder={lang === 'ar' ? 'ابحث في كل أعمال أبوبكر… أو اسأل بالعربية' : 'Search AboBakr\'s work… or ask in English'}
            value={q}
            onChange={(e) => { setQ(e.target.value); setAiAnswer(''); setSel(0); }}
            onKeyDown={onKeyDown}
          />
          <button className="btn btn-sm btn-outline" onClick={askAI} disabled={!q.trim() || aiThinking}>
            {aiThinking ? (lang === 'ar' ? 'يفكر…' : 'Thinking…') : (lang === 'ar' ? 'اسأل AI ↵' : 'Ask AI ↵')}
          </button>
          <span className="search-kbd">esc</span>
        </div>
        <div className="search-results">
          {(aiAnswer || aiThinking) && (
            <React.Fragment>
              <div className="search-section-label">
                <span>{lang === 'ar' ? 'الجواب' : 'Answer'}</span>
                <span className="ai-badge">✦ AI</span>
              </div>
              <div style={{ padding: '0.6rem 1rem 1rem', color: 'var(--clr-text)', fontSize: '0.95rem', lineHeight: 1.55 }}>
                {aiThinking ? (
                  <span className="text-muted" style={{ fontFamily: 'var(--font-mono)', fontSize: '0.8rem' }}>
                    {lang === 'ar' ? '· · · جاري التفكير' : '· · · processing'}
                  </span>
                ) : aiAnswer}
              </div>
            </React.Fragment>
          )}
          {Object.keys(grouped).length === 0 ? (
            <div className="search-empty">{lang === 'ar' ? 'لا توجد نتائج. جرّب الذكاء الاصطناعي ↵' : 'No matches. Try AI search ↵'}</div>
          ) : Object.entries(grouped).map(([type, items]) => (
            <div key={type}>
              <div className="search-section-label">
                <span>{
                  type === 'project' ? (lang === 'ar' ? 'مشاريع' : 'Projects') :
                  type === 'product' ? (lang === 'ar' ? 'منتجات' : 'Products') :
                  type === 'post' ? (lang === 'ar' ? 'مقالات' : 'Articles') :
                  type === 'page' ? (lang === 'ar' ? 'صفحات' : 'Pages') : type
                }</span>
                <span>{items.length}</span>
              </div>
              {items.map((item, i) => {
                const idx = Object.values(grouped).flat().indexOf(item);
                return (
                  <div
                    key={item.titleEn + i}
                    className={`search-result ${idx === sel ? 'selected' : ''}`}
                    onMouseEnter={() => setSel(idx)}
                    onClick={() => {
                      if (item.page === 'single-portfolio') openProject(item.id);
                      else setPage(item.page);
                      onClose();
                    }}
                  >
                    <div className="search-result__thumb" style={item.hue !== undefined ? placeholderBg(item) : { background: 'var(--clr-surface-2)' }} />
                    <div>
                      <div className="search-result__title">{lang === 'ar' ? item.titleAr : item.titleEn}</div>
                      <div className="search-result__meta">{item.cat}</div>
                    </div>
                    <span className="search-result__type">{item.type}</span>
                  </div>
                );
              })}
            </div>
          ))}
        </div>
      </div>
      <div style={{ marginTop: '1.2rem', fontFamily: 'var(--font-mono)', fontSize: '0.7rem', color: 'var(--clr-text-muted)', letterSpacing: '0.15em' }}>
        ↑↓ NAVIGATE · ↵ OPEN · SHIFT+↵ ASK AI · ESC CLOSE
      </div>
    </div>
  );
}

/* ─── WhatsApp floating widget ─── */
function WhatsAppWidget({ lang }) {
  const [open, setOpen] = useState(false);
  useEffect(() => {
    const t = setTimeout(() => setOpen(true), 4500);
    return () => clearTimeout(t);
  }, []);
  return (
    <div className={`wa-widget ${open ? '' : 'collapsed'}`}>
      <div className="wa-bubble">
        <div style={{ display: 'flex', justifyContent: 'space-between', alignItems: 'start' }}>
          <strong>{lang === 'ar' ? 'مرحبا 👋' : 'Hello 👋'}</strong>
          <button onClick={() => setOpen(false)} style={{ color: 'var(--clr-text-muted)' }} aria-label="close">✕</button>
        </div>
        <p>{lang === 'ar' ? 'أرد عادةً خلال ساعتين. أرسل تفاصيل المشروع وأرد بسعر تقديري.' : 'I usually reply within 2 hours. Send your project details for a quote.'}</p>
        <div className="wa-actions">
          <button>{lang === 'ar' ? 'إيميل' : 'Email'}</button>
          <button className="primary">{lang === 'ar' ? 'واتساب →' : 'WhatsApp →'}</button>
        </div>
      </div>
      <Magnet>
        <button className="wa-fab" onClick={() => setOpen(!open)} aria-label="whatsapp">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M20.5 3.5A11.8 11.8 0 0 0 12 0C5.4 0 0 5.4 0 12a12 12 0 0 0 1.6 6L0 24l6.2-1.6A12 12 0 0 0 12 24c6.6 0 12-5.4 12-12 0-3.2-1.3-6.2-3.5-8.5zm-8.5 18.4c-1.8 0-3.6-.5-5.2-1.4l-.4-.2-3.7 1 1-3.6-.2-.4A9.9 9.9 0 0 1 2 12c0-5.5 4.5-10 10-10s10 4.5 10 10-4.5 9.9-10 9.9zm5.5-7.4c-.3-.2-1.8-.9-2-1s-.5-.2-.7.2-.8 1-1 1.2-.4.2-.7 0-1.3-.5-2.4-1.5c-.9-.8-1.5-1.8-1.7-2.1s0-.5.1-.6c.1-.1.3-.4.4-.5l.3-.5c.1-.2 0-.4 0-.5l-.7-1.7c-.2-.5-.4-.4-.5-.4h-.5c-.2 0-.5.1-.7.3-.2.3-.9.9-.9 2.2 0 1.3.9 2.5 1 2.7.1.2 1.7 2.6 4.2 3.7 1.5.6 2.1.7 2.8.6.4-.1 1.3-.5 1.5-1 .2-.5.2-1 .1-1z"/></svg>
        </button>
      </Magnet>
    </div>
  );
}

Object.assign(window, { Header, Footer, PageCurtain, SearchOverlay, WhatsAppWidget });
