(() => {
    const overlay = document.getElementById('snake-intro');
    const canvas  = document.getElementById('snake-canvas');
    const ctx     = canvas.getContext('2d');

    const NAME     = 'Ayodeji';
    const DURATION = 3800;

    function resize() {
        canvas.width  = window.innerWidth;
        canvas.height = window.innerHeight;
    }
    resize();
    window.addEventListener('resize', resize);

    const cx = () => canvas.width  / 2;
    const cy = () => canvas.height / 2;

    function easeOutCubic(t)  { return 1 - Math.pow(1 - t, 3); }
    function easeInOutQuad(t) { return t < 0.5 ? 2*t*t : 1 - Math.pow(-2*t+2,2)/2; }

    function hexToRgb(hex) {
        return [parseInt(hex.slice(1,3),16), parseInt(hex.slice(3,5),16), parseInt(hex.slice(5,7),16)];
    }

    // ── Particles ─────────────────────────────────────────────
    const particles = [];
    const PCOLS = ['#00d4ff','#7b2fff','#00ffb3','#ffffff','#ff6bff'];

    function spawnBurst(count = 32) {
        for (let i = 0; i < count; i++) {
            const angle = (Math.PI * 2 / count) * i + Math.random() * 0.2;
            const speed = Math.random() * 5 + 2.5;
            particles.push({
                x: cx(), y: cy(),
                vx: Math.cos(angle) * speed,
                vy: Math.sin(angle) * speed,
                r: Math.random() * 3.5 + 1.5,
                life: 1,
                color: PCOLS[Math.floor(Math.random() * PCOLS.length)]
            });
        }
    }

    function updateParticles() {
        for (let i = particles.length - 1; i >= 0; i--) {
            const p = particles[i];
            p.x += p.vx; p.y += p.vy;
            p.vx *= 0.96; p.vy *= 0.96;
            p.life -= 0.015; p.r *= 0.975;
            if (p.life <= 0) { particles.splice(i, 1); continue; }
            const [r,g,b] = hexToRgb(p.color);
            ctx.beginPath();
            ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
            ctx.fillStyle = `rgba(${r},${g},${b},${p.life})`;
            ctx.fill();
        }
    }

    // ── Circular frame ────────────────────────────────────────
    const RING_R      = 120;   // main ring radius
    const RING_R2     = 135;   // outer ring radius
    const RING_R3     = 108;   // inner ring radius
    const TICK_COUNT  = 36;    // tick marks around ring
    const DOT_COUNT   = 8;     // glowing dots on ring

    function drawCircularFrame(drawProgress, ringRotation, scaleX, scaleY, alpha) {
        ctx.save();
        ctx.translate(cx(), cy());
        ctx.scale(scaleX, scaleY);

        // ── Outer faint ring ──
        ctx.beginPath();
        ctx.arc(0, 0, RING_R2, 0, Math.PI * 2);
        ctx.strokeStyle = `rgba(0,212,255,${alpha * 0.15})`;
        ctx.lineWidth   = 1;
        ctx.shadowBlur  = 0;
        ctx.stroke();

        // ── Inner faint ring ──
        ctx.beginPath();
        ctx.arc(0, 0, RING_R3, 0, Math.PI * 2);
        ctx.strokeStyle = `rgba(123,47,255,${alpha * 0.15})`;
        ctx.lineWidth   = 1;
        ctx.stroke();

        // ── Main ring — draws in arc by arc ──
        const arcEnd = drawProgress * Math.PI * 2 - Math.PI / 2;
        ctx.beginPath();
        ctx.arc(0, 0, RING_R, -Math.PI / 2, arcEnd);
        ctx.strokeStyle = `rgba(0,212,255,${alpha * 0.9})`;
        ctx.lineWidth   = 2.5;
        ctx.shadowColor = '#00d4ff';
        ctx.shadowBlur  = 16;
        ctx.stroke();

        // second arc (purple) slightly behind
        const arcEnd2 = (drawProgress * Math.PI * 2 - Math.PI / 2) - 0.3;
        ctx.beginPath();
        ctx.arc(0, 0, RING_R, -Math.PI / 2, arcEnd2);
        ctx.strokeStyle = `rgba(123,47,255,${alpha * 0.5})`;
        ctx.lineWidth   = 1.5;
        ctx.shadowColor = '#7b2fff';
        ctx.shadowBlur  = 10;
        ctx.stroke();

        // ── Tick marks (rotate with ringRotation) ──
        ctx.shadowBlur = 0;
        for (let i = 0; i < TICK_COUNT; i++) {
            const angle   = ringRotation + (Math.PI * 2 / TICK_COUNT) * i;
            const isMajor = i % 4 === 0;
            const inner   = RING_R - (isMajor ? 10 : 5);
            const outer   = RING_R + (isMajor ? 10 : 5);
            const x1 = Math.cos(angle) * inner;
            const y1 = Math.sin(angle) * inner;
            const x2 = Math.cos(angle) * outer;
            const y2 = Math.sin(angle) * outer;

            ctx.beginPath();
            ctx.moveTo(x1, y1);
            ctx.lineTo(x2, y2);
            ctx.strokeStyle = isMajor
                ? `rgba(0,212,255,${alpha * 0.8})`
                : `rgba(0,212,255,${alpha * 0.3})`;
            ctx.lineWidth = isMajor ? 2 : 1;
            ctx.stroke();
        }

        // ── Glowing dots on ring ──
        for (let i = 0; i < DOT_COUNT; i++) {
            const angle = ringRotation * 1.5 + (Math.PI * 2 / DOT_COUNT) * i;
            const x = Math.cos(angle) * RING_R;
            const y = Math.sin(angle) * RING_R;
            const col = PCOLS[i % PCOLS.length];
            const [r,g,b] = hexToRgb(col);

            ctx.beginPath();
            ctx.arc(x, y, 4, 0, Math.PI * 2);
            ctx.fillStyle   = `rgba(${r},${g},${b},${alpha})`;
            ctx.shadowColor = col;
            ctx.shadowBlur  = 12;
            ctx.fill();
        }

        // ── Scan line (horizontal sweep inside circle) ──
        const scanY = -RING_R + (RING_R * 2 * ((Date.now() % 1400) / 1400));
        const halfW = Math.sqrt(Math.max(0, RING_R * RING_R - scanY * scanY));
        const scanGrad = ctx.createLinearGradient(-halfW, scanY, halfW, scanY);
        scanGrad.addColorStop(0,   'rgba(0,212,255,0)');
        scanGrad.addColorStop(0.5, `rgba(0,212,255,${alpha * 0.12})`);
        scanGrad.addColorStop(1,   'rgba(0,212,255,0)');
        ctx.shadowBlur  = 0;
        ctx.fillStyle   = scanGrad;
        ctx.fillRect(-halfW, scanY - 1, halfW * 2, 2);

        // ── Cross-hair lines ──
        ctx.strokeStyle = `rgba(0,212,255,${alpha * 0.12})`;
        ctx.lineWidth   = 1;
        ctx.setLineDash([4, 8]);
        ctx.beginPath(); ctx.moveTo(-RING_R2, 0); ctx.lineTo(RING_R2, 0); ctx.stroke();
        ctx.beginPath(); ctx.moveTo(0, -RING_R2); ctx.lineTo(0, RING_R2); ctx.stroke();
        ctx.setLineDash([]);

        ctx.restore();
    }

    // ── Name ──────────────────────────────────────────────────
    function drawName(scaleX, scaleY, alpha) {
        const fontSize = Math.min(canvas.width / NAME.length * 0.42, 56);
        ctx.save();
        ctx.translate(cx(), cy());
        ctx.scale(scaleX, scaleY);
        ctx.font         = `900 ${fontSize}px 'Segoe UI', sans-serif`;
        ctx.textAlign    = 'center';
        ctx.textBaseline = 'middle';

        for (let i = 4; i > 0; i--) {
            ctx.shadowColor = '#00d4ff';
            ctx.shadowBlur  = i * 14;
            ctx.fillStyle   = `rgba(0,212,255,${0.07 * i * alpha})`;
            ctx.fillText(NAME, 0, 0);
        }
        ctx.shadowBlur = 0;

        const grad = ctx.createLinearGradient(-canvas.width/2, 0, canvas.width/2, 0);
        grad.addColorStop(0,   '#00d4ff');
        grad.addColorStop(0.35,'#7b2fff');
        grad.addColorStop(0.7, '#00ffb3');
        grad.addColorStop(1,   '#ffffff');
        ctx.globalAlpha = alpha;
        ctx.fillStyle   = grad;
        ctx.fillText(NAME, 0, 0);
        ctx.globalAlpha = 1;
        ctx.restore();
    }

    // ── Main loop ─────────────────────────────────────────────
    // Timeline:
    //  0    – 500ms  : ring draws in, name fades in
    //  500  – 1000ms : horizontal flip
    //  1000 – 1500ms : vertical flip
    //  1500 – 2200ms : both flip + ring spins fast
    //  2200 – 2900ms : hold, burst particles
    //  2900 – 3800ms : fade out

    let startTime = null;
    let bursted   = false;
    let ringRot   = 0;

    function animate(ts) {
        if (!startTime) startTime = ts;
        const elapsed = ts - startTime;

        ctx.fillStyle = '#050510';
        ctx.fillRect(0, 0, canvas.width, canvas.height);

        // global fade out
        const fadeOut = elapsed > 2900
            ? 1 - easeInOutQuad(Math.min((elapsed - 2900) / 900, 1))
            : 1;

        // ring draw-in (0→1 over first 500ms)
        const drawProgress = easeOutCubic(Math.min(elapsed / 500, 1));

        // ring rotation speed — faster during flip phase
        const rotSpeed = (elapsed > 1500 && elapsed < 2200) ? 0.04 : 0.012;
        ringRot += rotSpeed;

        // flip scaleX / scaleY
        let scaleX = 1, scaleY = 1;

        if (elapsed >= 500 && elapsed < 1000) {
            const t = (elapsed - 500) / 500;
            scaleX = Math.cos(easeInOutQuad(t) * Math.PI * 2);
            scaleY = 1;
        } else if (elapsed >= 1000 && elapsed < 1500) {
            const t = (elapsed - 1000) / 500;
            scaleX = 1;
            scaleY = Math.cos(easeInOutQuad(t) * Math.PI * 2);
        } else if (elapsed >= 1500 && elapsed < 2200) {
            const t = (elapsed - 1500) / 700;
            const angle = easeInOutQuad(t) * Math.PI * 2;
            scaleX = Math.cos(angle);
            scaleY = Math.cos(angle);
        }

        // burst when flips done
        if (elapsed > 2200 && !bursted) {
            spawnBurst(32);
            bursted = true;
        }

        drawCircularFrame(drawProgress, ringRot, scaleX, scaleY, fadeOut);

        const nameAlpha = (Math.abs(scaleX) < 0.08 || Math.abs(scaleY) < 0.08)
            ? 0 : fadeOut;
        drawName(scaleX, scaleY, nameAlpha);

        updateParticles();

        if (elapsed < DURATION) {
            requestAnimationFrame(animate);
        } else {
            overlay.classList.add('hide');
            setTimeout(() => { overlay.style.display = 'none'; }, 850);
        }
    }

    requestAnimationFrame(animate);
})();
