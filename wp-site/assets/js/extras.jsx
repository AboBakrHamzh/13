/* AboBakr — QuickView modal, Cart drawer, Toast, enhanced product card */

function QuickView({ open, item, type, lang, onClose, onOpenFull, onAddCart }) {
  const [imgIdx, setImgIdx] = useState(0);
  useEffect(() => { setImgIdx(0); }, [item]);
  useEffect(() => {
    if (!open) return;
    const onKey = (e) => { if (e.key === 'Escape') onClose(); };
    window.addEventListener('keydown', onKey);
    document.body.style.overflow = 'hidden';
    return () => { window.removeEventListener('keydown', onKey); document.body.style.overflow = ''; };
  }, [open, onClose]);
  if (!item) return null;

  const images = Array.from({ length: 4 }).map((_, i) => ({
    hue: (item.hue || 30) + i * 14, sat: item.sat || 14, light: (item.light || 18) + (i % 2 ? -3 : 3),
  }));
  const isProject = type === 'project';
  const isProduct = type === 'product';
  const isVideo = type === 'video';

  const titleAr = item.titleAr || item.title || '';
  const titleEn = item.titleEn || item.title || '';

  return (
    <div className={`qv ${open ? 'open' : ''}`} onClick={(e) => { if (e.target === e.currentTarget) onClose(); }}>
      <div className={`qv__panel ${open ? 'in' : ''}`}>
        <button className="qv__close" onClick={onClose} data-cursor-label={lang === 'ar' ? 'إغلاق' : 'close'}>✕</button>
        <div className="qv__media">
          <div className="qv__media-stage" style={placeholderBg(images[imgIdx])}>
            {isVideo && (
              <button className="qv__play" data-cursor-label={lang === 'ar' ? 'تشغيل' : 'play'}>
                <span>▶</span>
              </button>
            )}
            <span className="qv__source-tag">
              {isProject ? (lang === 'ar' ? 'مشروع' : 'Project')
                : isVideo ? (lang === 'ar' ? 'فيديو' : 'Video')
                : isProduct ? (lang === 'ar' ? 'منتج' : 'Product') : ''}
            </span>
          </div>
          {!isVideo && (
            <div className="qv__thumbs">
              {images.map((im, i) => (
                <button key={i} className={`qv__thumb ${i === imgIdx ? 'active' : ''}`} onClick={() => setImgIdx(i)} style={placeholderBg(im)} data-cursor-label={`${i + 1}`}></button>
              ))}
            </div>
          )}
        </div>
        <div className="qv__info">
          <div>
            <div className="eyebrow">
              {isProject ? (lang === 'ar' ? item.catLabelAr : item.catLabelEn) :
               isProduct ? item.cat :
               isVideo ? `${item.ratio} · ${item.duration}` : ''}
              {item.year && <span style={{ marginInlineStart: '0.6rem', color: 'var(--clr-text-muted)' }}>· {item.year}</span>}
            </div>
            <h2 className="qv__title">{lang === 'ar' ? titleAr : titleEn}</h2>
            <p className="qv__desc">
              {lang === 'ar'
                ? (isProject ? `مشروع مُنفّذ بعناية لـ ${item.client || 'عميل خاص'}. اضغط على «افتح المشروع كاملاً» لمشاهدة معرض الصور والقصة.` :
                   isProduct ? 'منتج إبداعي من استوديو أبوبكر. اضغط لإضافته للسلة أو فتح صفحة المنتج كاملةً.' :
                   'فيديو من سلسلة الإنتاج البصري. شاهده مباشرةً أو اضغط لفتح صفحة الفيديو الكاملة.')
                : (isProject ? `A project carefully executed for ${item.client || 'a private client'}. Open the full case for gallery and narrative.` :
                   isProduct ? 'A creative product from AboBakr studio. Add to cart or open the full product page.' :
                   'A video from the visual production reel. Watch in place or open the full page.')}
            </p>

            {isProject && (
              <div className="qv__stats">
                {item.client && <div><span>{lang === 'ar' ? 'العميل' : 'Client'}</span><strong>{item.client}</strong></div>}
                <div><span>{lang === 'ar' ? 'السنة' : 'Year'}</span><strong>{item.year}</strong></div>
                <div><span>{lang === 'ar' ? 'النوع' : 'Type'}</span><strong>{lang === 'ar' ? item.catLabelAr : item.catLabelEn}</strong></div>
              </div>
            )}

            {isProduct && (
              <React.Fragment>
                <div className="qv__price">
                  {fmtSAR(item.price, lang)}<small>{lang === 'ar' ? ' ر.س' : ' SAR'}</small>
                </div>
                <div className="qv__feats">
                  <span>● {item.type === 'digital' ? (lang === 'ar' ? 'تحميل فوري' : 'Instant download') : item.type === 'physical' ? (lang === 'ar' ? 'شحن خلال ٣ أيام' : 'Ships in 3 days') : (lang === 'ar' ? 'تواصل بعد الدفع' : 'Briefed after purchase')}</span>
                  <span>● {lang === 'ar' ? 'ضمان رضا 14 يوماً' : '14-day satisfaction'}</span>
                  <span>● {lang === 'ar' ? 'دفع آمن' : 'Secure payment'}</span>
                </div>
              </React.Fragment>
            )}
          </div>

          <div className="qv__actions">
            {isProduct ? (
              <React.Fragment>
                <Magnet><button className="btn btn-primary btn-lg" onClick={() => { onAddCart(item); onClose(); }}>{lang === 'ar' ? 'أضف للسلة' : 'Add to cart'} <span className="arrow">→</span></button></Magnet>
                <Magnet><button className="btn btn-outline btn-lg" onClick={onOpenFull}>{lang === 'ar' ? 'صفحة المنتج' : 'Full page'}</button></Magnet>
              </React.Fragment>
            ) : (
              <React.Fragment>
                <Magnet><button className="btn btn-primary btn-lg" onClick={onOpenFull}>{isVideo ? (lang === 'ar' ? 'مشاهدة كاملة' : 'Watch full') : (lang === 'ar' ? 'افتح كاملاً' : 'Open full')} <span className="arrow">→</span></button></Magnet>
                <Magnet><button className="btn btn-outline btn-lg" onClick={onClose}>{lang === 'ar' ? 'العودة' : 'Back'}</button></Magnet>
              </React.Fragment>
            )}
          </div>
        </div>
      </div>
    </div>
  );
}

function CartDrawer({ open, onClose, cart, setCart, lang, setPage }) {
  useEffect(() => {
    if (!open) return;
    const onKey = (e) => { if (e.key === 'Escape') onClose(); };
    window.addEventListener('keydown', onKey);
    return () => window.removeEventListener('keydown', onKey);
  }, [open, onClose]);

  // Group by id with qty
  const grouped = useMemo(() => {
    const m = new Map();
    cart.forEach((p) => {
      const e = m.get(p.id);
      if (e) e.qty += 1;
      else m.set(p.id, { ...p, qty: 1 });
    });
    return Array.from(m.values());
  }, [cart]);

  const total = grouped.reduce((s, p) => s + p.price * p.qty, 0);
  const updateQty = (id, delta) => {
    if (delta > 0) {
      const item = grouped.find((p) => p.id === id);
      if (item) setCart([...cart, item]);
    } else {
      const idx = cart.map((p) => p.id).lastIndexOf(id);
      if (idx >= 0) { const next = [...cart]; next.splice(idx, 1); setCart(next); }
    }
  };
  const removeAll = (id) => setCart(cart.filter((p) => p.id !== id));

  return (
    <React.Fragment>
      <div className={`cart-backdrop ${open ? 'open' : ''}`} onClick={onClose}></div>
      <aside className={`cart ${open ? 'open' : ''}`} aria-hidden={!open}>
        <header className="cart__head">
          <div>
            <div className="eyebrow">{lang === 'ar' ? 'سلتك' : 'Your cart'}</div>
            <h3>{grouped.length} {lang === 'ar' ? (grouped.length === 1 ? 'عنصر' : 'عناصر') : (grouped.length === 1 ? 'item' : 'items')}</h3>
          </div>
          <button onClick={onClose} className="icon-btn" aria-label="close">✕</button>
        </header>
        <div className="cart__body">
          {grouped.length === 0 ? (
            <div className="cart__empty">
              <div className="cart__empty-mark">⌖</div>
              <h4>{lang === 'ar' ? 'سلتك فارغة' : 'Your cart is empty'}</h4>
              <p>{lang === 'ar' ? 'استكشف المتجر وأضف منتجات إبداعية.' : 'Browse the shop and add creative products.'}</p>
              <Magnet><button className="btn btn-primary" onClick={() => { onClose(); setPage('shop'); }}>{lang === 'ar' ? 'افتح المتجر' : 'Open shop'} <span className="arrow">→</span></button></Magnet>
            </div>
          ) : grouped.map((p, i) => (
            <div key={p.id} className="cart__row">
              <div className="cart__thumb" style={placeholderBg({ hue: 20 + i * 30, sat: 16, light: 18 })}></div>
              <div className="cart__row-info">
                <div className="cart__row-cat">{p.cat}</div>
                <h4>{lang === 'ar' ? p.titleAr : p.titleEn}</h4>
                <div className="cart__row-controls">
                  <div className="qty">
                    <button onClick={() => updateQty(p.id, -1)} aria-label="decrease">−</button>
                    <span>{p.qty}</span>
                    <button onClick={() => updateQty(p.id, +1)} aria-label="increase">+</button>
                  </div>
                  <button className="cart__row-remove" onClick={() => removeAll(p.id)}>{lang === 'ar' ? 'حذف' : 'Remove'}</button>
                </div>
              </div>
              <div className="cart__row-price">
                {fmtSAR(p.price * p.qty, lang)}
                <small>{lang === 'ar' ? 'ر.س' : 'SAR'}</small>
              </div>
            </div>
          ))}
        </div>
        {grouped.length > 0 && (
          <footer className="cart__foot">
            <div className="cart__sum">
              <div className="cart__sum-row"><span>{lang === 'ar' ? 'المجموع' : 'Subtotal'}</span><span>{fmtSAR(total, lang)} {lang === 'ar' ? 'ر.س' : 'SAR'}</span></div>
              <div className="cart__sum-row text-muted"><span>{lang === 'ar' ? 'الشحن' : 'Shipping'}</span><span>{lang === 'ar' ? 'يُحسب لاحقاً' : 'Calculated next'}</span></div>
              <div className="cart__sum-row total"><span>{lang === 'ar' ? 'الإجمالي' : 'Total'}</span><span>{fmtSAR(total, lang)} {lang === 'ar' ? 'ر.س' : 'SAR'}</span></div>
            </div>
            <Magnet><button className="btn btn-primary" style={{ width: '100%', justifyContent: 'center' }}>
              {lang === 'ar' ? 'إكمال الدفع' : 'Checkout'} <span className="arrow">→</span>
            </button></Magnet>
            <div style={{ display: 'flex', justifyContent: 'center', gap: '0.4rem', marginTop: '0.8rem', fontFamily: 'var(--font-mono)', fontSize: '0.65rem', color: 'var(--clr-text-muted)', letterSpacing: '0.1em' }}>
              <span>VISA</span>·<span>MADA</span>·<span>APPLE PAY</span>·<span>STC PAY</span>
            </div>
          </footer>
        )}
      </aside>
    </React.Fragment>
  );
}

function Toast({ toast }) {
  return (
    <div className={`toast ${toast ? 'show' : ''}`}>
      <span className="toast__mark">✓</span>
      <span>{toast}</span>
    </div>
  );
}

function ProductCardV2({ p, lang, addToCart, openQuickView, hue = 30 }) {
  const typeLabel = (t) => t === 'digital' ? (lang === 'ar' ? 'رقمي' : 'Digital') : t === 'physical' ? (lang === 'ar' ? 'مادي' : 'Physical') : (lang === 'ar' ? 'خدمة' : 'Service');
  const enriched = { ...p, hue, sat: 16, light: 18 };
  return (
    <article className="prod prod--v2">
      <button className="prod__media" style={placeholderBg({ hue, sat: 16, light: 18 })} onClick={() => openQuickView(enriched, 'product')} data-cursor-label={lang === 'ar' ? 'عرض سريع' : 'quick view'}>
        <span className={`prod__type ${p.type}`}>{typeLabel(p.type)}</span>
        <span className="prod__hover-actions">
          <span className="prod__hover-btn">{lang === 'ar' ? 'عرض سريع' : 'Quick view'}</span>
        </span>
      </button>
      <div className="prod__body">
        <span className="prod__cat">{p.cat}</span>
        <h3 className="prod__title">{lang === 'ar' ? p.titleAr : p.titleEn}</h3>
        <div className="prod__row">
          <div className="prod__price">{fmtSAR(p.price, lang)}<small>{lang === 'ar' ? 'ر.س' : 'SAR'}</small></div>
          <div style={{ display: 'flex', gap: '0.4rem' }}>
            <button className="prod__icon-btn" onClick={() => openQuickView(enriched, 'product')} aria-label="quick view" title={lang === 'ar' ? 'عرض سريع' : 'quick view'} data-cursor-label={lang === 'ar' ? 'عرض' : 'view'}>
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
            </button>
            <Magnet><button className="btn btn-sm btn-primary" onClick={() => addToCart(p)}>
              + {lang === 'ar' ? 'سلة' : 'Cart'}
            </button></Magnet>
          </div>
        </div>
      </div>
    </article>
  );
}

Object.assign(window, { QuickView, CartDrawer, Toast, ProductCardV2 });
