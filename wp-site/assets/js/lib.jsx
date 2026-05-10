/* AboBakr — shared hooks and helpers */

const { useState, useEffect, useRef, useCallback, useMemo, createContext, useContext } = React;

/* ─── i18n ─── */
const SiteContext = createContext(null);

function SiteProvider({ children, value }) {
  return <SiteContext.Provider value={value}>{children}</SiteContext.Provider>;
}
function useSite() { return useContext(SiteContext); }
function useT() {
  const { lang } = useSite();
  // returns picker: t({ar:'..', en:'..'})
  return (obj) => (obj && (lang === 'ar' ? obj.ar : obj.en)) || '';
}

/* ─── Reveal on scroll ─── */
function useReveal() {
  useEffect(() => {
    const els = document.querySelectorAll('.reveal:not(.in)');
    const io = new IntersectionObserver((entries) => {
      entries.forEach((e) => {
        if (e.isIntersecting) {
          e.target.classList.add('in');
          io.unobserve(e.target);
        }
      });
    }, { threshold: 0.12, rootMargin: '0px 0px -8% 0px' });
    els.forEach((el) => io.observe(el));
    return () => io.disconnect();
  });
}

/* ─── Magnetic button wrapper ─── */
function Magnet({ children, strength = 0.3, ...rest }) {
  const ref = useRef(null);
  const onMove = useCallback((e) => {
    const el = ref.current;
    if (!el) return;
    const r = el.getBoundingClientRect();
    const x = e.clientX - (r.left + r.width / 2);
    const y = e.clientY - (r.top + r.height / 2);
    el.style.transform = `translate(${x * strength}px, ${y * strength}px)`;
  }, [strength]);
  const onLeave = useCallback(() => {
    const el = ref.current;
    if (el) el.style.transform = 'translate(0,0)';
  }, []);
  return (
    <span className="magnet" ref={ref} onMouseMove={onMove} onMouseLeave={onLeave} {...rest}>
      {children}
    </span>
  );
}

/* ─── Sound (subtle UI tones via WebAudio) ─── */
function useSound(enabled) {
  const ctxRef = useRef(null);
  const getCtx = () => {
    if (!enabled) return null;
    if (!ctxRef.current) {
      try { ctxRef.current = new (window.AudioContext || window.webkitAudioContext)(); }
      catch (e) { return null; }
    }
    return ctxRef.current;
  };
  const beep = useCallback((freq = 480, dur = 0.05, type = 'sine', gain = 0.05) => {
    const ctx = getCtx();
    if (!ctx) return;
    if (ctx.state === 'suspended') ctx.resume();
    const o = ctx.createOscillator();
    const g = ctx.createGain();
    o.type = type;
    o.frequency.value = freq;
    g.gain.value = 0;
    g.gain.setTargetAtTime(gain, ctx.currentTime, 0.005);
    g.gain.setTargetAtTime(0, ctx.currentTime + dur, 0.04);
    o.connect(g).connect(ctx.destination);
    o.start();
    o.stop(ctx.currentTime + dur + 0.2);
  }, [enabled]);
  return {
    hover: () => beep(900, 0.025, 'sine', 0.012),
    click: () => beep(560, 0.06, 'triangle', 0.04),
    tick: () => beep(1400, 0.018, 'square', 0.008),
    open: () => { beep(440, 0.08, 'sine', 0.04); setTimeout(() => beep(660, 0.08, 'sine', 0.04), 60); },
  };
}

/* ─── Custom cursor ─── */
function CustomCursor() {
  const dot = useRef(null);
  const ring = useRef(null);
  const label = useRef(null);
  const [labelText, setLabelText] = useState('');

  useEffect(() => {
    let mx = window.innerWidth / 2, my = window.innerHeight / 2;
    let rx = mx, ry = my;
    let raf = 0;
    const onMove = (e) => {
      mx = e.clientX; my = e.clientY;
      if (dot.current) dot.current.style.transform = `translate(${mx}px, ${my}px) translate(-50%, -50%)`;
      if (label.current) label.current.style.transform = `translate(${mx}px, ${my}px) translate(-50%, calc(-50% + 46px))`;
    };
    const tick = () => {
      rx += (mx - rx) * 0.18;
      ry += (my - ry) * 0.18;
      if (ring.current) ring.current.style.transform = `translate(${rx}px, ${ry}px) translate(-50%, -50%)`;
      raf = requestAnimationFrame(tick);
    };
    tick();
    window.addEventListener('mousemove', onMove);

    const onOver = (e) => {
      const t = e.target;
      const interactive = t.closest('a, button, [data-cursor], .filter-chip, .icon-btn, .calc__opt, .gal-item, .bento__cell, .prod, .testi__dot, .nav a, .lang-switch button, .view-toggle button, .process__nav-item, input, textarea, select, [role="button"]');
      if (!interactive) {
        document.body.classList.remove('cursor-hover', 'cursor-text', 'cursor-drag');
        setLabelText('');
        return;
      }
      const tag = (interactive.tagName || '').toLowerCase();
      if (tag === 'input' || tag === 'textarea') {
        document.body.classList.add('cursor-text');
        document.body.classList.remove('cursor-hover', 'cursor-drag');
      } else if (interactive.dataset.cursor === 'drag') {
        document.body.classList.add('cursor-drag');
        document.body.classList.remove('cursor-hover', 'cursor-text');
        setLabelText(interactive.dataset.cursorLabel || '');
      } else {
        document.body.classList.add('cursor-hover');
        document.body.classList.remove('cursor-text', 'cursor-drag');
        setLabelText(interactive.dataset.cursorLabel || '');
      }
    };
    window.addEventListener('mouseover', onOver);

    return () => {
      window.removeEventListener('mousemove', onMove);
      window.removeEventListener('mouseover', onOver);
      cancelAnimationFrame(raf);
    };
  }, []);

  return (
    <React.Fragment>
      <div className="cursor-ring" ref={ring} />
      <div className="cursor-dot" ref={dot} />
      <div className="cursor-label" ref={label}>{labelText}</div>
    </React.Fragment>
  );
}

/* ─── Placeholder image generator (CSS-only) ─── */
function placeholderBg(seed = {}) {
  const hue = seed.hue ?? 30;
  const sat = seed.sat ?? 14;
  const light = seed.light ?? 18;
  const accent = `hsl(${hue}, ${sat + 10}%, ${Math.min(40, light + 18)}%)`;
  const dark = `hsl(${hue}, ${sat}%, ${Math.max(6, light - 6)}%)`;
  const mid = `hsl(${hue}, ${sat - 4}%, ${light - 2}%)`;
  return {
    background: `
      radial-gradient(ellipse at 28% 22%, ${accent}, transparent 55%),
      radial-gradient(ellipse at 72% 78%, hsl(${(hue + 180) % 360}, ${sat - 5}%, ${light - 4}%), transparent 50%),
      linear-gradient(135deg, ${mid}, ${dark} 70%)
    `,
  };
}

/* ─── Format number with locale ─── */
function fmtSAR(n, lang) {
  const f = new Intl.NumberFormat(lang === 'ar' ? 'ar-SA' : 'en-US').format(n);
  return f;
}

/* ─── Detect Cmd-K ─── */
function useHotkey(combo, handler) {
  useEffect(() => {
    const onKey = (e) => {
      const isK = e.key.toLowerCase() === combo.key.toLowerCase();
      const meta = combo.meta ? (e.metaKey || e.ctrlKey) : true;
      if (isK && meta) {
        e.preventDefault();
        handler(e);
      }
    };
    window.addEventListener('keydown', onKey);
    return () => window.removeEventListener('keydown', onKey);
  }, [handler, combo.key, combo.meta]);
}

/* expose */
function SoundToggle({ soundOn, setSoundOn, lang }) {
  return (
    <button className="sound-toggle" onClick={() => setSoundOn(!soundOn)} aria-label="sound" title={lang === 'ar' ? 'صوت' : 'sound'}>
      {soundOn ? (
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2"><path d="M11 5 6 9H2v6h4l5 4V5zM19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"/></svg>
      ) : (
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2"><path d="M11 5 6 9H2v6h4l5 4V5zM23 9l-6 6M17 9l6 6"/></svg>
      )}
    </button>
  );
}

Object.assign(window, {
  SiteProvider, SiteContext, useSite, useT,
  useReveal, Magnet, useSound, CustomCursor, SoundToggle,
  placeholderBg, fmtSAR, useHotkey,
});
