/**
 * ═══════════════════════════════════════════════════════
 * IDEAS INSTITUTE: "VŨ TRỤ TRI THỨC 3D" (THREE.JS PORTAL)
 * ═══════════════════════════════════════════════════════
 */

document.addEventListener('DOMContentLoaded', () => {
    // Check if Three.js is loaded
    if (typeof THREE === 'undefined') {
        console.error("Three.js is not loaded. 3D viewport cannot be initialized.");
        const container = document.getElementById('canvas-container');
        if (container) {
            container.innerHTML = `
                <div style="padding: 50px; text-align: center; font-family: sans-serif; background: #f8fafc; min-height: 100vh; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                    <h1 style="color: #b31400; margin-bottom: 20px;">Không thể tải Vũ trụ 3D</h1>
                    <p style="color: #334155; max-width: 500px; line-height: 1.6;">
                        Không thể kết nối đến máy chủ thư viện 3D (Three.js). Vui lòng kiểm tra kết nối mạng của bạn và thử lại.
                    </p>
                    <a href="https://ideas.edu.vn" style="margin-top: 30px; display: inline-block; padding: 12px 28px; background: #b31400; color: #fff; text-decoration: none; border-radius: 99px; font-weight: bold;">Quay lại trang chủ</a>
                </div>
            `;
        }
        const preloader = document.getElementById('ideas-portal-loader');
        if (preloader) {
            preloader.classList.add('loaded');
        }
        return;
    }

    // Check WebGL availability
    function hasWebGL() {
        try {
            const canvas = document.createElement('canvas');
            return !!(window.WebGLRenderingContext && (canvas.getContext('webgl') || canvas.getContext('experimental-webgl')));
        } catch (e) {
            return false;
        }
    }

    if (!hasWebGL()) {
        document.body.innerHTML = `
            <div style="padding: 50px; text-align: center; font-family: sans-serif; background: #f8fafc; min-height: 100vh; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                <h1 style="color: #b31400; margin-bottom: 20px;">Trình duyệt của bạn không hỗ trợ WebGL</h1>
                <p style="color: #334155; max-width: 500px; line-height: 1.6;">
                    Để trải nghiệm Vũ Trụ Tri Thức IDEAS 3D, vui lòng nâng cấp trình duyệt hoặc bật tăng tốc phần cứng trong cài đặt trình duyệt của bạn.
                </p>
                <a href="https://ideas.edu.vn" style="margin-top: 30px; display: inline-block; padding: 12px 28px; background: #b31400; color: #fff; text-decoration: none; border-radius: 99px; font-weight: bold;">Quay lại trang chủ</a>
            </div>
        `;
        return;
    }

    // ── Preloader Animation ──
    const preloader = document.getElementById('ideas-portal-loader');
    const progressBar = document.querySelector('.portal-loader-progress');
    if (preloader && progressBar) {
        let progress = 0;
        const interval = setInterval(() => {
            progress += Math.random() * 15;
            if (progress >= 100) {
                progress = 100;
                clearInterval(interval);
                setTimeout(() => {
                    preloader.classList.add('loaded');
                }, 400);
            }
            progressBar.style.width = `${progress}%`;
        }, 100);
    }

    // ── Global Scene State ──
    let activeMode = 'explore'; // 'explore' or 'tunnel'
    let selectedProgramId = null;
    let hoveredNode = null;
    let hoveredTunnelPlane = null;
    let autoScrollSpeed = 0;
    
    // Scene objects
    let scene, camera, renderer, starfield, nebula;
    let coreGroup, constellationGroup, tunnelGroup;
    let coreMesh, coreWireframe, coreLight;
    
    // 3D Nodes maps
    const programNodes = [];
    const connectionLines = [];
    const tunnelPlanes = [];
    const htmlLabels = [];

    // Camera Target Vectors for Easing
    const cameraTargetPos = new THREE.Vector3(0, 15, 28);
    const cameraTargetLookAt = new THREE.Vector3(0, 0, 0);
    const cameraCurrentLookAt = new THREE.Vector3(0, 0, 0);
    
    // Default viewpoints
    const VIEW_HOME_POS = new THREE.Vector3(0, 14, 26);
    const VIEW_QUIZ_POS = new THREE.Vector3(-10, 12, 22);
    const VIEW_TUNNEL_HOME_POS = new THREE.Vector3(0, 0, 15);
    const VIEW_TUNNEL_TARGET_LOOK = new THREE.Vector3(0, 0, -150);

    // Mouse Tracking for Raycasting
    const mouse = new THREE.Vector2();
    const raycaster = new THREE.Raycaster();

    // Textures Cache
    const textureLoader = new THREE.TextureLoader();
    const textureCache = {};

    // ── Swiss UMEF programs mapping (Omit IDEAS06 Dual DBA) ──
    const programIds = ['IDEAS01', 'IDEAS02', 'IDEAS03', 'IDEAS04', 'IDEAS05', 'IDEAS07'];
    
    // Aesthetic Palette for Nodes
    const nodeAesthetics = {
        'IDEAS01': { color: 0xb31400, label: 'Full BBA' },
        'IDEAS02': { color: 0xd4af37, label: 'Online MBA' },
        'IDEAS03': { color: 0x0f172a, label: 'Executive MBA' },
        'IDEAS04': { color: 0x0284c7, label: 'MSc AI' },
        'IDEAS05': { color: 0xe11d48, label: 'MBA in AI' },
        'IDEAS07': { color: 0xf59e0b, label: 'TOP-UP BBA' }
    };

    // ════════════════════════════════════════════
    // THREE.JS SCENE INITIALIZATION
    // ════════════════════════════════════════════
    function initThree() {
        const container = document.getElementById('canvas-container');
        if (!container) return;

        // Scene
        scene = new THREE.Scene();
        scene.background = new THREE.Color(0x060913); // Dark background

        // Camera
        camera = new THREE.PerspectiveCamera(50, window.innerWidth / window.innerHeight, 0.1, 1000);
        camera.position.copy(VIEW_HOME_POS);

        // Renderer
        renderer = new THREE.WebGLRenderer({ antialias: true, alpha: false, powerPreference: "high-performance" });
        renderer.setSize(window.innerWidth, window.innerHeight);
        renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
        renderer.shadowMap.enabled = false;
        container.appendChild(renderer.domElement);

        // Lights
        const ambientLight = new THREE.AmbientLight(0xffffff, 0.75);
        scene.add(ambientLight);

        // Directional Light for volumetric shadows and highlights
        const dirLight = new THREE.DirectionalLight(0xfff5f0, 0.8);
        dirLight.position.set(10, 20, 15);
        scene.add(dirLight);

        // Volumetric background grids and dust
        buildStarfield();

        // 3D groups
        coreGroup = new THREE.Group();
        constellationGroup = new THREE.Group();
        tunnelGroup = new THREE.Group();

        scene.add(coreGroup);
        scene.add(constellationGroup);
        scene.add(tunnelGroup);

        // Build Scene Content
        buildConstellation();
        buildGraduationTunnel();

        // Event listeners
        window.addEventListener('resize', onWindowResize);
        window.addEventListener('mousemove', onMouseMove);
        window.addEventListener('click', onCanvasClick);
        window.addEventListener('wheel', onMouseWheel, { passive: false });

        // Touch listeners for mobile support
        let touchStartY = 0;
        window.addEventListener('touchstart', (e) => {
            if (e.touches.length > 0) touchStartY = e.touches[0].clientY;
        }, { passive: true });
        window.addEventListener('touchmove', (e) => {
            if (activeMode === 'tunnel' && e.touches.length > 0) {
                const deltaY = touchStartY - e.touches[0].clientY;
                touchStartY = e.touches[0].clientY;
                cameraTargetPos.z -= deltaY * 0.08;
                cameraTargetPos.z = Math.max(-120, Math.min(22, cameraTargetPos.z));
            }
        }, { passive: true });

        // Start render loop
        animate();
    }

    // ── Build Academic Dust & Starfield ──
    function buildStarfield() {
        const count = 1200;
        const positions = new Float32Array(count * 3);
        const colors = new Float32Array(count * 3);

        for (let i = 0; i < count; i++) {
            // Distribute stars in space
            positions[i * 3] = (Math.random() - 0.5) * 85;
            positions[i * 3 + 1] = (Math.random() - 0.5) * 50;
            positions[i * 3 + 2] = (Math.random() - 0.5) * 85;

            // Pure white stars
            colors[i * 3] = 1.0;
            colors[i * 3 + 1] = 1.0;
            colors[i * 3 + 2] = 1.0;
        }

        const geometry = new THREE.BufferGeometry();
        geometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));
        geometry.setAttribute('color', new THREE.BufferAttribute(colors, 3));

        const material = new THREE.PointsMaterial({
            size: 0.16,
            vertexColors: true,
            transparent: true,
            opacity: 0.85,
            sizeAttenuation: true
        });

        starfield = new THREE.Points(geometry, material);
        scene.add(starfield);
    }

    // ── Build Flagship Program Constellation (Orbiting Spheres) ──
    function buildConstellation() {
        // 1. Central Core Sphere (IDEAS Knowledge Core)
        const coreGeo = new THREE.SphereGeometry(2.2, 32, 32);
        const coreMat = new THREE.MeshStandardMaterial({
            color: 0xb31400,
            roughness: 0.1,
            metalness: 0.8,
            emissive: 0xb31400,
            emissiveIntensity: 0.4
        });
        coreMesh = new THREE.Mesh(coreGeo, coreMat);
        coreGroup.add(coreMesh);

        // Core Wireframe for orbital rotation details
        const wireGeo = new THREE.SphereGeometry(2.4, 16, 16);
        const wireMat = new THREE.MeshBasicMaterial({
            color: 0xd4af37,
            wireframe: true,
            transparent: true,
            opacity: 0.35
        });
        coreWireframe = new THREE.Mesh(wireGeo, wireMat);
        coreGroup.add(coreWireframe);

        // Light coming from the core
        coreLight = new THREE.PointLight(0xb31400, 1.5, 30);
        coreLight.position.set(0, 0, 0);
        coreGroup.add(coreLight);

        // 2. Program Nodes
        const radius = 12;
        const totalNodes = programIds.length;
        
        programIds.forEach((id, index) => {
            const data = IDEAS_DATA.programmes[id];
            if (!data) return;

            const aes = nodeAesthetics[id] || { color: 0xb31400 };

            // Node group (to coordinate sphere + ring)
            const nodeGroup = new THREE.Group();
            
            // Compute orbit angle
            const angle = (index / totalNodes) * Math.PI * 2;
            const x = radius * Math.cos(angle);
            const z = radius * Math.sin(angle);
            const y = (index % 2 === 0 ? 1 : -1) * 1.5; // Orbit height wave

            nodeGroup.position.set(x, y, z);
            nodeGroup.userData = {
                id: id,
                angle: angle,
                radius: radius,
                heightOffset: y,
                originalScale: new THREE.Vector3(1, 1, 1),
                name: data.name || aes.label
            };

            // Mesh Sphere
            const sphereGeo = new THREE.SphereGeometry(0.72, 32, 32);
            const sphereMat = new THREE.MeshStandardMaterial({
                color: aes.color,
                roughness: 0.15,
                metalness: 0.7,
                emissive: aes.color,
                emissiveIntensity: 0.25
            });
            const sphereMesh = new THREE.Mesh(sphereGeo, sphereMat);
            sphereMesh.userData = { parentGroup: nodeGroup };
            nodeGroup.add(sphereMesh);

            // Orbit Ring around sphere
            const ringGeo = new THREE.RingGeometry(0.95, 1.05, 32);
            const ringMat = new THREE.MeshBasicMaterial({
                color: aes.color,
                side: THREE.DoubleSide,
                transparent: true,
                opacity: 0.45
            });
            const ringMesh = new THREE.Mesh(ringGeo, ringMat);
            ringMesh.rotation.x = Math.PI / 2;
            nodeGroup.add(ringMesh);

            constellationGroup.add(nodeGroup);
            programNodes.push(nodeGroup);

            // Create HTML overlay label
            createNodeHtmlLabel(nodeGroup, id, aes.label);
        });

        // 3. Connect Nodes via Neon Linkage
        buildConnectionLines();
    }

    // ── Build Glowing Connection Lines ──
    function buildConnectionLines() {
        const material = new THREE.LineBasicMaterial({
            color: 0xb31400,
            transparent: true,
            opacity: 0.18
        });

        // Lines connecting each node to the core
        programNodes.forEach(node => {
            const points = [];
            points.push(new THREE.Vector3(0, 0, 0));
            points.push(node.position);

            const geometry = new THREE.BufferGeometry().setFromPoints(points);
            const line = new THREE.Line(geometry, material);
            constellationGroup.add(line);
            connectionLines.push({ line, node, type: 'core' });
        });

        // Ring lines connecting program nodes to form a constellation web
        for (let i = 0; i < programNodes.length; i++) {
            const nodeA = programNodes[i];
            const nodeB = programNodes[(i + 1) % programNodes.length];

            const points = [];
            points.push(nodeA.position);
            points.push(nodeB.position);

            const geometry = new THREE.BufferGeometry().setFromPoints(points);
            const line = new THREE.Line(geometry, material);
            constellationGroup.add(line);
            connectionLines.push({ line, nodeA, nodeB, type: 'web' });
        }
    }

    // ── HTML Labels projected on 2D Screen ──
    function createNodeHtmlLabel(nodeGroup, id, name) {
        const hudLayer = document.getElementById('hud-layer');
        if (!hudLayer) return;

        const label = document.createElement('div');
        label.className = `three-label hud-label-${id}`;
        label.innerHTML = `
            <div class="three-label-inner">
                <i class="fa-solid fa-graduation-cap"></i>
                <span>${name}</span>
            </div>
        `;
        label.addEventListener('click', (e) => {
            e.stopPropagation();
            selectProgramNode(id);
        });

        hudLayer.appendChild(label);
        htmlLabels.push({ element: label, node: nodeGroup, id: id });
    }

    // Helper to generate elegant fallback texture if CORS blocks images
    function createPhotoTexture(url, title, school, callback) {
        // Try direct loader first
        const image = new Image();
        if (url.startsWith('http')) {
            image.crossOrigin = "anonymous";
        }
        image.src = url;

        image.onload = () => {
            // Draw image on canvas to mask it with rounded corners (border-radius)
            const canvas = document.createElement('canvas');
            canvas.width = image.naturalWidth || image.width || 1024;
            canvas.height = image.naturalHeight || image.height || 640;
            const ctx = canvas.getContext('2d');
            
            const radius = Math.min(canvas.width, canvas.height) * 0.05; // 5% border radius
            ctx.beginPath();
            ctx.moveTo(radius, 0);
            ctx.lineTo(canvas.width - radius, 0);
            ctx.quadraticCurveTo(canvas.width, 0, canvas.width, radius);
            ctx.lineTo(canvas.width, canvas.height - radius);
            ctx.quadraticCurveTo(canvas.width, canvas.height, canvas.width - radius, canvas.height);
            ctx.lineTo(radius, canvas.height);
            ctx.quadraticCurveTo(0, canvas.height, 0, canvas.height - radius);
            ctx.lineTo(0, radius);
            ctx.quadraticCurveTo(0, 0, radius, 0);
            ctx.closePath();
            ctx.clip();
            
            ctx.drawImage(image, 0, 0, canvas.width, canvas.height);
            
            const texture = new THREE.CanvasTexture(canvas);
            callback(texture);
        };

        image.onerror = () => {
            // Load custom premium canvas layout as fallback texture
            const canvas = document.createElement('canvas');
            canvas.width = 512;
            canvas.height = 320;
            const ctx = canvas.getContext('2d');

            // Rounded rectangle path for fallback
            const radius = 24;
            ctx.beginPath();
            ctx.moveTo(radius, 0);
            ctx.lineTo(512 - radius, 0);
            ctx.quadraticCurveTo(512, 0, 512, radius);
            ctx.lineTo(512, 320 - radius);
            ctx.quadraticCurveTo(512, 320, 512 - radius, 320);
            ctx.lineTo(radius, 320);
            ctx.quadraticCurveTo(0, 320, 0, 320 - radius);
            ctx.lineTo(0, radius);
            ctx.quadraticCurveTo(0, 0, radius, 0);
            ctx.closePath();
            ctx.clip();

            // Draw premium dark/crimson gradient backdrop
            const grad = ctx.createLinearGradient(0, 0, 512, 320);
            grad.addColorStop(0, '#7f1d1d'); // Deep dark red
            grad.addColorStop(1, '#0f172a'); // Deep navy
            ctx.fillStyle = grad;
            ctx.fillRect(0, 0, 512, 320);

            // Gold frame outline
            ctx.strokeStyle = '#d4af37';
            ctx.lineWidth = 10;
            ctx.strokeRect(20, 20, 472, 280);

            // Draw graduation iconography
            ctx.fillStyle = '#ffffff';
            ctx.font = 'bold 36px "Plus Jakarta Sans", sans-serif';
            ctx.textAlign = 'center';
            ctx.fillText("GRADUATION", 256, 100);

            ctx.font = 'bold 24px "Plus Jakarta Sans", sans-serif';
            ctx.fillText(school.toUpperCase(), 256, 160);

            ctx.fillStyle = '#d4af37';
            ctx.font = '18px "Plus Jakarta Sans", sans-serif';
            ctx.fillText(title, 256, 210);

            ctx.font = 'italic 16px "Plus Jakarta Sans", sans-serif';
            ctx.fillText("IDEAS INSTITUTE", 256, 250);

            const texture = new THREE.CanvasTexture(canvas);
            callback(texture);
        };
    }

    // ── Build Helix Memory Tunnel (Lễ Tốt Nghiệp) ──
    function buildGraduationTunnel() {
        const ceremonies = IDEAS_DATA.graduation_ceremony;
        if (!ceremonies) return;

        // Spiral helix particles forming the tunnel tube
        const tunnelStarCount = 800;
        const helixGeom = new THREE.BufferGeometry();
        const helixPositions = new Float32Array(tunnelStarCount * 3);
        const helixColors = new Float32Array(tunnelStarCount * 3);
        const redColor = new THREE.Color(0xb31400);
        const goldColor = new THREE.Color(0xd4af37);

        for (let i = 0; i < tunnelStarCount; i++) {
            const z = 30 - (i / tunnelStarCount) * 180; // Stretch along Z
            const angle = (i * 0.12) % (Math.PI * 2);
            const r = 8.5; // Spiral radius

            helixPositions[i * 3] = r * Math.cos(angle);
            helixPositions[i * 3 + 1] = r * Math.sin(angle);
            helixPositions[i * 3 + 2] = z;

            const starClr = i % 2 === 0 ? redColor : goldColor;
            helixColors[i * 3] = starClr.r;
            helixColors[i * 3 + 1] = starClr.g;
            helixColors[i * 3 + 2] = starClr.b;
        }

        helixGeom.setAttribute('position', new THREE.BufferAttribute(helixPositions, 3));
        helixGeom.setAttribute('color', new THREE.BufferAttribute(helixColors, 3));
        
        const helixMat = new THREE.PointsMaterial({
            size: 0.22,
            vertexColors: true,
            transparent: true,
            opacity: 0.9,
            sizeAttenuation: true
        });

        const tunnelStars = new THREE.Points(helixGeom, helixMat);
        tunnelGroup.add(tunnelStars);

        // Floating widescreen picture frames
        ceremonies.forEach((cer, idx) => {
            // Build geometry
            const width = 3.6;
            const height = 2.25;
            const planeGeo = new THREE.PlaneGeometry(width, height);

            // Draw loading canvas pre-load
            const loadCanvas = document.createElement('canvas');
            loadCanvas.width = 256;
            loadCanvas.height = 160;
            const ctx = loadCanvas.getContext('2d');
            ctx.fillStyle = '#ffffff';
            ctx.fillRect(0, 0, 256, 160);
            ctx.fillStyle = '#b31400';
            ctx.textAlign = 'center';
            ctx.font = '14px sans-serif';
            ctx.fillText("Loading memory...", 128, 80);
            
            const initialTexture = new THREE.CanvasTexture(loadCanvas);
            const planeMat = new THREE.MeshBasicMaterial({
                map: initialTexture,
                side: THREE.DoubleSide,
                transparent: false
            });

            const mesh = new THREE.Mesh(planeGeo, planeMat);

            // Compute spiral Z coordinates along helix corridor
            const zDist = -18 - idx * 16; 
            const angle = idx * 1.5; // Offset placement angles
            const radius = 3.8;
            const x = radius * Math.cos(angle);
            const y = radius * Math.sin(angle);

            mesh.position.set(x, y, zDist);
            
            // Align plane slightly towards tunnel axis
            mesh.lookAt(new THREE.Vector3(0, 0, zDist - 5));
            mesh.userData = {
                index: idx,
                ceremony: cer,
                originalRotation: mesh.rotation.clone(),
                originalPosition: mesh.position.clone()
            };

            tunnelGroup.add(mesh);
            tunnelPlanes.push(mesh);

            // Pull image texture safely using fallback mechanism
            createPhotoTexture(cer.avatar, cer.name, cer.school, (loadedTexture) => {
                planeMat.map = loadedTexture;
                planeMat.needsUpdate = true;
            });
        });

        // ── Add IDEAS Logo at the end of the tunnel ──
        const logoGroup = new THREE.Group();
        logoGroup.position.set(0, 0, -135);
        logoGroup.name = "endLogoGroup";
        
        const logoWidth = 5.5;
        const logoHeight = 5.5;
        const logoGeo = new THREE.PlaneGeometry(logoWidth, logoHeight);
        const logoTexture = textureLoader.load('assets/logo.png');
        const logoMat = new THREE.MeshBasicMaterial({
            map: logoTexture,
            transparent: true,
            side: THREE.DoubleSide
        });
        const logoMesh = new THREE.Mesh(logoGeo, logoMat);
        logoGroup.add(logoMesh);
        
        const ringGeo = new THREE.RingGeometry(3.0, 3.2, 64);
        const ringMat = new THREE.MeshBasicMaterial({
            color: 0xd4af37, // Gold
            side: THREE.DoubleSide,
            transparent: true,
            opacity: 0.6
        });
        const ringMesh = new THREE.Mesh(ringGeo, ringMat);
        ringMesh.name = "glowRing";
        logoGroup.add(ringMesh);
        
        tunnelGroup.add(logoGroup);

        // Hide tunnel initially
        tunnelGroup.visible = false;
    }

    // ════════════════════════════════════════════
    // VIEWPORTS SWITCHING & TWEEN LOGIC
    // ════════════════════════════════════════════
    function setMode(mode) {
        if (mode === activeMode) return;
        activeMode = mode;

        // UI state toggle
        const exploreBtn = document.getElementById('nav-btn-explore');
        const quizBtn = document.getElementById('nav-btn-quiz');
        const tunnelBtn = document.getElementById('nav-btn-tunnel');
        const toggleExplore = document.getElementById('toggle-mode-explore');
        const toggleTunnel = document.getElementById('toggle-mode-tunnel');

        [exploreBtn, quizBtn, tunnelBtn, toggleExplore, toggleTunnel].forEach(b => {
            if (b) b.classList.remove('active');
        });

        // Hide overlays
        document.getElementById('hud-panel-left').classList.add('hidden');
        document.getElementById('hud-panel-right').classList.add('hidden');
        document.getElementById('tunnel-info-overlay').classList.remove('active');
        document.getElementById('scroll-instructions').style.display = 'none';

        // Set layout variables
        if (mode === 'explore') {
            exploreBtn && exploreBtn.classList.add('active');
            toggleExplore && toggleExplore.classList.add('active');
            
            constellationGroup.visible = true;
            coreGroup.visible = true;
            tunnelGroup.visible = false;

            // Show labels
            htmlLabels.forEach(l => l.element.classList.add('visible'));

            cameraTargetPos.copy(VIEW_HOME_POS);
            cameraTargetLookAt.set(0, 0, 0);
            selectedProgramId = null;
            updateQuickSelectorButtons();
        } else if (mode === 'tunnel') {
            tunnelBtn && tunnelBtn.classList.add('active');
            toggleTunnel && toggleTunnel.classList.add('active');

            constellationGroup.visible = false;
            coreGroup.visible = false;
            tunnelGroup.visible = true;

            // Hide labels
            htmlLabels.forEach(l => l.element.classList.remove('visible'));

            cameraTargetPos.copy(VIEW_TUNNEL_HOME_POS);
            cameraTargetLookAt.copy(VIEW_TUNNEL_TARGET_LOOK);
            
            // Show scroll tip
            const scrollInstructions = document.getElementById('scroll-instructions');
            if (scrollInstructions) scrollInstructions.style.display = 'flex';
        }
    }

    function selectProgramNode(id) {
        if (activeMode !== 'explore') setMode('explore');

        selectedProgramId = id;
        const node = programNodes.find(n => n.userData.id === id);
        if (!node) return;

        // Fly camera to node
        const offset = new THREE.Vector3();
        offset.copy(node.position).normalize().multiplyScalar(4.5); // Fly vector offset
        offset.y += 1.8;

        cameraTargetPos.copy(node.position).add(offset);
        cameraTargetLookAt.copy(node.position);

        // Highlight label
        htmlLabels.forEach(l => {
            l.element.classList.toggle('active', l.id === id);
        });

        // Populate and open details HUD (Left Panel)
        updateLeftHudPanel(id);
        updateQuickSelectorButtons();
    }

    function resetConstellationView() {
        if (activeMode !== 'explore') setMode('explore');
        
        selectedProgramId = null;
        cameraTargetPos.copy(VIEW_HOME_POS);
        cameraTargetLookAt.set(0, 0, 0);

        htmlLabels.forEach(l => l.element.classList.remove('active'));
        document.getElementById('hud-panel-left').classList.add('hidden');
        updateQuickSelectorButtons();
    }

    function startQuizMode() {
        setMode('explore');
        cameraTargetPos.copy(VIEW_QUIZ_POS);
        cameraTargetLookAt.set(0, 0, 0);
        
        // Open Right HUD Panel
        const rightPanel = document.getElementById('hud-panel-right');
        if (rightPanel) rightPanel.classList.remove('hidden');
        
        // Reset left panel
        document.getElementById('hud-panel-left').classList.add('hidden');
    }

    // ── Mouse & Wheel Handlers ──
    function onMouseMove(event) {
        mouse.x = (event.clientX / window.innerWidth) * 2 - 1;
        mouse.y = -(event.clientY / window.innerHeight) * 2 + 1;
    }

    function onCanvasClick(event) {
        if (activeMode === 'explore') {
            if (hoveredNode) {
                selectProgramNode(hoveredNode.userData.id);
            } else {
                // If clicked inside HUD elements or modals, do not reset
                if (event && (event.target.closest('#hud-layer') || event.target.closest('#compare-modal') || event.target.closest('#bk-modal'))) {
                    return;
                }

                // If clicked empty space, reset
                const leftPanel = document.getElementById('hud-panel-left');
                const isLeftPanelHovered = leftPanel && leftPanel.matches(':hover');
                const rightPanel = document.getElementById('hud-panel-right');
                const isRightPanelHovered = rightPanel && rightPanel.matches(':hover');
                const isCompareModalOpen = document.getElementById('compare-modal').style.display === 'flex';
                
                // Avoid resetting if interacting with overlays/modals
                if (!isLeftPanelHovered && !isRightPanelHovered && !isCompareModalOpen) {
                    resetConstellationView();
                }
            }
        } else if (activeMode === 'tunnel') {
            if (hoveredTunnelPlane && hoveredTunnelPlane.userData.ceremony.link) {
                window.open(hoveredTunnelPlane.userData.ceremony.link, '_blank');
            }
        }
    }

    function onMouseWheel(event) {
        if (activeMode === 'tunnel') {
            // Prevent body scroll (even though body has overflow:hidden, it's good safety)
            event.preventDefault();

            // Scrolling shifts camera Z-axis coordinate in tunnel
            const zoomSpeed = event.deltaY * 0.05;
            cameraTargetPos.z -= zoomSpeed;

            // Bounds to prevent user from exiting the tunnel corridor
            cameraTargetPos.z = Math.max(-125, Math.min(22, cameraTargetPos.z));

            // Adjust look at dynamically as user flies
            cameraTargetLookAt.set(0, 0, cameraTargetPos.z - 25);
        }
    }

    function onWindowResize() {
        if (!camera || !renderer) return;
        camera.aspect = window.innerWidth / window.innerHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(window.innerWidth, window.innerHeight);
    }

    // ════════════════════════════════════════════
    // RENDER / TICK LOOP
    // ════════════════════════════════════════════
    function animate() {
        requestAnimationFrame(animate);

        const time = Date.now() * 0.0006;

        // 1. Slow cosmic rotation in explore mode
        if (activeMode === 'explore') {
            starfield.rotation.y = time * 0.02;
            starfield.rotation.x = time * 0.01;
            
            // Orbiting program nodes
            programNodes.forEach(node => {
                const data = node.userData;
                // Add slow orbit rotation speed over time
                const currentAngle = data.angle + time * 0.08;
                node.position.x = data.radius * Math.cos(currentAngle);
                node.position.z = data.radius * Math.sin(currentAngle);
                
                // Keep label links connected
                node.position.y = data.heightOffset + Math.sin(time * 2 + data.angle) * 0.3;
                
                // Spin individual sphere
                const sphere = node.children[0];
                if (sphere) sphere.rotation.y = time * 0.5;
            });

            // Dynamically update camera target to follow the selected node's orbit
            if (selectedProgramId) {
                const node = programNodes.find(n => n.userData.id === selectedProgramId);
                if (node) {
                    const offset = new THREE.Vector3();
                    offset.copy(node.position).normalize().multiplyScalar(4.5);
                    offset.y += 1.8;
                    cameraTargetPos.copy(node.position).add(offset);
                    cameraTargetLookAt.copy(node.position);
                }
            }

            // Re-render neon lines
            let lineIndex = 0;
            // Center connecting lines
            programNodes.forEach(node => {
                const connection = connectionLines[lineIndex++];
                if (connection && connection.line) {
                    const positions = connection.line.geometry.attributes.position.array;
                    positions[3] = node.position.x;
                    positions[4] = node.position.y;
                    positions[5] = node.position.z;
                    connection.line.geometry.attributes.position.needsUpdate = true;
                }
            });
            // Ring connection lines
            for (let i = 0; i < programNodes.length; i++) {
                const connection = connectionLines[lineIndex++];
                if (connection && connection.line) {
                    const nodeA = connection.nodeA;
                    const nodeB = connection.nodeB;
                    const positions = connection.line.geometry.attributes.position.array;
                    positions[0] = nodeA.position.x;
                    positions[1] = nodeA.position.y;
                    positions[2] = nodeA.position.z;
                    positions[3] = nodeB.position.x;
                    positions[4] = nodeB.position.y;
                    positions[5] = nodeB.position.z;
                    connection.line.geometry.attributes.position.needsUpdate = true;
                }
            }

            // Spin Core
            if (coreWireframe) {
                coreWireframe.rotation.y = -time * 0.15;
                coreWireframe.rotation.z = time * 0.08;
            }
            if (coreMesh) {
                coreMesh.rotation.y = time * 0.04;
            }
        } else if (activeMode === 'tunnel') {
            // Rotate tunnel slightly for helical drift effect
            starfield.rotation.z = time * 0.05;
            tunnelGroup.children[0].rotation.z = -time * 0.03;

            // Rotate the end logo's gold ring
            const logoGroup = tunnelGroup.getObjectByName("endLogoGroup");
            if (logoGroup) {
                const ring = logoGroup.getObjectByName("glowRing");
                if (ring) {
                    ring.rotation.z = time * 0.5;
                }
            }
        }

        // 2. Camera Easing Interpolation (LERP)
        camera.position.lerp(cameraTargetPos, 0.06);
        cameraCurrentLookAt.lerp(cameraTargetLookAt, 0.06);
        camera.lookAt(cameraCurrentLookAt);

        // 3. Project 3D Nodes coordinates onto HTML labels
        if (activeMode === 'explore') {
            updateHtmlLabels();
        }

        // 4. Raycasting intersects
        checkIntersects();

        // Render scene
        renderer.render(scene, camera);
    }

    // ── Update HTML Overlay Label Coordinates ──
    function updateHtmlLabels() {
        const tempV = new THREE.Vector3();
        htmlLabels.forEach(l => {
            tempV.copy(l.node.position);
            tempV.y += 0.85; // Raise slightly above sphere
            tempV.project(camera);

            // Check if node is behind camera view plane
            if (tempV.z > 1) {
                l.element.classList.remove('visible');
                return;
            }

            const x = (tempV.x * .5 + .5) * window.innerWidth;
            const y = (tempV.y * -.5 + .5) * window.innerHeight;

            l.element.style.transform = `translate(-50%, -100%) translate(${x}px,${y}px)`;
            l.element.classList.add('visible');
        });
    }

    // ── Check Raycast Intersections ──
    function checkIntersects() {
        raycaster.setFromCamera(mouse, camera);

        if (activeMode === 'explore') {
            // Find spheres in the nodes
            const spheres = programNodes.map(n => n.children[0]);
            const intersects = raycaster.intersectObjects(spheres);

            if (intersects.length > 0) {
                const nodeGroup = intersects[0].object.userData.parentGroup;
                
                if (hoveredNode !== nodeGroup) {
                    if (hoveredNode) {
                        // Restore previous scale
                        hoveredNode.scale.set(1, 1, 1);
                    }
                    hoveredNode = nodeGroup;
                    hoveredNode.scale.set(1.2, 1.2, 1.2); // Hover enlargement
                    document.body.style.cursor = 'pointer';
                }
            } else {
                if (hoveredNode) {
                    hoveredNode.scale.set(1, 1, 1);
                    hoveredNode = null;
                    document.body.style.cursor = 'default';
                }
            }
        } else if (activeMode === 'tunnel') {
            const intersects = raycaster.intersectObjects(tunnelPlanes);

            if (intersects.length > 0) {
                const plane = intersects[0].object;
                
                if (hoveredTunnelPlane !== plane) {
                    if (hoveredTunnelPlane) {
                        resetTunnelPlane(hoveredTunnelPlane);
                    }
                    hoveredTunnelPlane = plane;
                    document.body.style.cursor = 'pointer';

                    // Hover scale up slightly
                    plane.scale.set(1.15, 1.15, 1.15);
                    
                    // Slightly turn plane to face camera completely
                    plane.rotation.set(0, 0, 0);

                    // Show info overlay card
                    updateTunnelInfoOverlay(plane.userData.ceremony);
                }
            } else {
                if (hoveredTunnelPlane) {
                    resetTunnelPlane(hoveredTunnelPlane);
                    hoveredTunnelPlane = null;
                    document.body.style.cursor = 'default';
                    
                    // Hide overlay card
                    document.getElementById('tunnel-info-overlay').classList.remove('active');
                }
            }
        }
    }

    function resetTunnelPlane(plane) {
        plane.scale.set(1, 1, 1);
        plane.rotation.copy(plane.userData.originalRotation);
    }

    // ════════════════════════════════════════════
    // HUD LAYER CONTROLS & BINDINGS
    // ════════════════════════════════════════════
    
    // ── Update Left HUD Details Panel ──
    function updateLeftHudPanel(id) {
        const prog = IDEAS_DATA.programmes[id];
        if (!prog) return;

        // Hide placeholders
        document.getElementById('placeholder-details').classList.add('hidden');
        document.getElementById('program-details-wrap').classList.remove('hidden');

        // Populate elements
        document.getElementById('prog-school').textContent = prog.school;
        document.getElementById('prog-title').textContent = prog.program_name_degree || prog.name;
        document.getElementById('prog-country').textContent = prog.country;
        document.getElementById('prog-tagline').innerHTML = prog.tagline || prog.description;
        document.getElementById('prog-duration').textContent = prog.duration;
        
        // Render subjects/ECTS details
        const ectsField = document.getElementById('prog-ects');
        if (prog.subjects.includes("ECTS")) {
            const ectsMatch = prog.subjects.match(/(\d+)\s*ECTS/i);
            ectsField.textContent = ectsMatch ? `${ectsMatch[1]} ECTS` : "90 ECTS";
        } else {
            ectsField.textContent = prog.subjects;
        }

        // Render benefits checklist
        const benefitsList = document.getElementById('prog-benefits');
        benefitsList.innerHTML = '';
        
        const benefitsArray = prog.program_benefits_degree || prog.benefits || [];
        benefitsArray.forEach(b => {
            const li = document.createElement('li');
            li.innerHTML = `<i class="fa-solid fa-circle-check"></i> <span>${b}</span>`;
            benefitsList.appendChild(li);
        });

        // Set action links & booking prefill name attributes
        const ctaBtn = document.getElementById('prog-cta-btn');
        if (ctaBtn) {
            ctaBtn.setAttribute('data-program', prog.name);
        }

        const linkBtn = document.getElementById('prog-link-btn');
        if (linkBtn) {
            linkBtn.href = prog.link || '#';
        }

        // Slide panel open
        document.getElementById('hud-panel-left').classList.remove('hidden');
    }

    // ── Update Graduation Tunnel Overlay Card ──
    function updateTunnelInfoOverlay(cer) {
        const overlay = document.getElementById('tunnel-info-overlay');
        if (!overlay) return;

        document.getElementById('tunnel-info-img').src = cer.avatar;
        document.getElementById('tunnel-info-school').textContent = cer.school;
        document.getElementById('tunnel-info-title').textContent = `${cer.title} - ${cer.name}`;
        document.getElementById('tunnel-info-location').textContent = cer.location;
        document.getElementById('tunnel-info-time').textContent = cer.time;

        const albumBtn = document.getElementById('tunnel-info-btn');
        if (albumBtn) {
            albumBtn.href = cer.link || '#';
            albumBtn.style.display = cer.link ? 'inline-block' : 'none';
        }

        overlay.classList.add('active');
    }

    // ── Update Quick Selector buttons (Bottom bar) ──
    function updateQuickSelectorButtons() {
        const buttons = document.querySelectorAll('.quick-node-btn');
        buttons.forEach(btn => {
            const id = btn.getAttribute('data-id');
            btn.classList.toggle('active', id === selectedProgramId);
        });
    }

    // ── Bind Bottom controls and Mode Nav buttons ──
    function bindUiControls() {
        // Nav Links
        document.getElementById('nav-btn-explore').addEventListener('click', () => setMode('explore'));
        document.getElementById('nav-btn-tunnel').addEventListener('click', () => setMode('tunnel'));
        document.getElementById('nav-btn-quiz').addEventListener('click', startQuizMode);

        // Bottom dock toggles
        document.getElementById('toggle-mode-explore').addEventListener('click', () => setMode('explore'));
        document.getElementById('toggle-mode-tunnel').addEventListener('click', () => setMode('tunnel'));

        // Quick Selector nodes
        const selectorContainer = document.querySelector('.program-quick-selector');
        if (selectorContainer) {
            selectorContainer.addEventListener('click', (e) => {
                const btn = e.target.closest('.quick-node-btn');
                if (btn) {
                    e.stopPropagation(); // Prevent bubbling to window click handler
                    const id = btn.getAttribute('data-id');
                    selectProgramNode(id);
                }
            });
        }
    }

    // ════════════════════════════════════════════
    // DYNAMIC COMPARISON MATRIX MODAL BUILDER (Omit IDEAS06)
    // ════════════════════════════════════════════
    const compareTable = document.getElementById('compare-table');
    const compareModal = document.getElementById('compare-modal');
    const triggerCompare = document.getElementById('trigger-compare-matrix');
    const closeCompare = document.getElementById('compare-modal-close');
    const closeCompareBtn = document.getElementById('compare-close-btn');

    function buildCompareMatrix() {
        if (!compareTable || typeof IDEAS_DATA === 'undefined' || !IDEAS_DATA.programmes) return;
        
        // Retrieve and filter out IDEAS06 Dual DBA
        const programs = Object.entries(IDEAS_DATA.programmes)
            .filter(([id]) => id !== 'IDEAS06')
            .map(([, p]) => p);

        // Build Table Header
        let theadHTML = `<tr><th>Tiêu chí so sánh</th>`;
        programs.forEach(p => {
            theadHTML += `<th>${p.name}</th>`;
        });
        theadHTML += `</tr>`;

        // Build Table Rows
        let schoolRow = `<tr><td>Trường Đại Học</td>`;
        programs.forEach(p => { schoolRow += `<td>${p.school}</td>`; });
        schoolRow += `</tr>`;

        let countryRow = `<tr><td>Quốc gia cấp bằng</td>`;
        programs.forEach(p => { countryRow += `<td>${p.country}</td>`; });
        countryRow += `</tr>`;

        let durationRow = `<tr><td>Thời gian học</td>`;
        programs.forEach(p => { durationRow += `<td>${p.duration}</td>`; });
        durationRow += `</tr>`;

        let ectsRow = `<tr><td>Tín chỉ ECTS / Cấu trúc</td>`;
        programs.forEach(p => { ectsRow += `<td>${p.subjects || '-'}</td>`; });
        ectsRow += `</tr>`;

        let priceRow = `<tr><td>Học phí niêm yết</td>`;
        programs.forEach(p => {
            const price = p.fee_course[0]?.price || '-';
            priceRow += `<td class="compare-highlight">${price}</td>`;
        });
        priceRow += `</tr>`;

        let reqRow = `<tr><td>Điều kiện tuyển sinh</td>`;
        programs.forEach(p => {
            const list = p.experience ? p.experience.map(item => `<li>${item}</li>`).join('') : '';
            reqRow += `<td><ul style="padding-left: 16px; margin: 0; font-size: 0.8rem; line-height: 1.4; text-align: left;">${list}</ul></td>`;
        });
        reqRow += `</tr>`;

        let actionRow = `<tr><td>Hành động</td>`;
        programs.forEach(p => {
            actionRow += `
                <td>
                    <div style="display: flex; flex-direction: column; gap: 8px;">
                        <button class="btn-primary-crimson bk-open-btn" data-program="${p.name}" style="white-space: nowrap; font-size: 0.75rem; padding: 8px 16px;">Tư vấn</button>
                        <a href="${p.link}" class="btn-glass-crimson" style="text-align: center; white-space: nowrap; font-size: 0.75rem; padding: 7px 14px;">Xem chi tiết</a>
                    </div>
                </td>
            `;
        });
        actionRow += `</tr>`;

        compareTable.innerHTML = theadHTML + schoolRow + countryRow + durationRow + ectsRow + priceRow + reqRow + actionRow;
    }

    function openCompareModal() {
        if (compareModal) {
            compareModal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }
    }

    function closeCompareModal() {
        if (compareModal) {
            compareModal.style.display = 'none';
            if (activeMode !== 'tunnel') {
                document.body.style.overflow = 'hidden'; // Keep body lock in portal modes
            } else {
                document.body.style.overflow = '';
            }
        }
    }

    if (triggerCompare) triggerCompare.addEventListener('click', openCompareModal);
    if (closeCompare) closeCompare.addEventListener('click', closeCompareModal);
    if (closeCompareBtn) closeCompareBtn.addEventListener('click', closeCompareModal);
    if (compareModal) {
        compareModal.addEventListener('click', (e) => {
            if (e.target === compareModal) closeCompareModal();
        });
    }

    // ════════════════════════════════════════════
    // PATHFINDER QUIZ INTERACTION & RECOMMENDATIONS
    // ════════════════════════════════════════════
    const quizPanel = document.getElementById('hud-panel-right');
    const quizSteps = document.querySelectorAll('.quiz-step-hud');
    const btnNext = document.getElementById('quiz-btn-next');
    const btnPrev = document.getElementById('quiz-btn-prev');
    const progressFill = document.getElementById('quiz-progress-fill');
    
    let currentStep = 1;
    const quizAnswers = {
        education: null,
        experience: null,
        objective: null
    };

    function initQuiz() {
        // Option selects
        quizSteps.forEach(step => {
            step.addEventListener('click', (e) => {
                const option = e.target.closest('.quiz-option-hud');
                if (!option) return;

                // Toggle selected class
                step.querySelectorAll('.quiz-option-hud').forEach(opt => opt.classList.remove('selected'));
                option.classList.add('selected');

                const val = option.getAttribute('data-val');
                const stepNum = parseInt(step.getAttribute('data-step'));

                if (stepNum === 1) quizAnswers.education = val;
                if (stepNum === 2) quizAnswers.experience = val;
                if (stepNum === 3) quizAnswers.objective = val;

                btnNext.disabled = false;

                // Auto-advance step after 350ms delay
                setTimeout(() => {
                    btnNext.click();
                }, 350);
            });
        });

        // Next Step Button
        btnNext.addEventListener('click', () => {
            if (currentStep < 3) {
                // Advance step
                quizSteps[currentStep - 1].classList.remove('active');
                currentStep++;
                quizSteps[currentStep - 1].classList.add('active');

                // Check if next option is already selected to toggle disabled
                const nextStepOptionsSelected = quizSteps[currentStep - 1].querySelector('.quiz-option-hud.selected');
                btnNext.disabled = !nextStepOptionsSelected;
                
                // Show back button
                btnPrev.style.visibility = 'visible';

                // Update progress fill
                const progressPercent = ((currentStep - 1) / 3) * 100;
                progressFill.style.width = `${progressPercent}%`;

                if (currentStep === 3) btnNext.textContent = 'Hoàn tất';
            } else {
                // Compute Results
                progressFill.style.width = `100%`;
                renderQuizResults();
            }
        });

        // Previous Step Button
        btnPrev.addEventListener('click', () => {
            if (currentStep > 1) {
                quizSteps[currentStep - 1].classList.remove('active');
                currentStep--;
                quizSteps[currentStep - 1].classList.add('active');

                btnNext.disabled = false;
                btnNext.textContent = 'Tiếp theo';

                if (currentStep === 1) btnPrev.style.visibility = 'hidden';

                const progressPercent = ((currentStep - 1) / 3) * 100;
                progressFill.style.width = `${progressPercent}%`;
            }
        });
    }

    function renderQuizResults() {
        const edu = quizAnswers.education;
        const exp = quizAnswers.experience;
        const obj = quizAnswers.objective;

        let recommendedId = 'IDEAS02'; // Default Online MBA

        // Academic logic routes
        if (edu === 'highschool') {
            recommendedId = 'IDEAS01'; // Full BBA
        } else if (edu === 'college') {
            recommendedId = 'IDEAS07'; // TOP-UP BBA
        } else if (edu === 'bachelor') {
            if (obj === 'tech') {
                recommendedId = 'IDEAS04'; // MSc AI
            } else if (exp === 'over-5') {
                recommendedId = 'IDEAS03'; // EMBA
            } else if (obj === 'management' && exp === '2-to-5') {
                recommendedId = 'IDEAS02'; // Online MBA
            } else {
                recommendedId = 'IDEAS02';
            }
        } else if (edu === 'master') {
            if (obj === 'tech') {
                recommendedId = 'IDEAS05'; // MBA in AI
            } else {
                recommendedId = 'IDEAS03'; // EMBA
            }
        }

        const prog = IDEAS_DATA.programmes[recommendedId];
        if (!prog) return;

        // Hide quiz steps, show results
        quizSteps.forEach(s => s.classList.remove('active'));
        btnNext.style.display = 'none';
        btnPrev.style.display = 'none';
        document.querySelector('.quiz-footer-hud').style.display = 'none';

        const resultCard = document.getElementById('quiz-result-card');
        resultCard.innerHTML = `
            <div class="quiz-result-tag-hud">Đề xuất phù hợp nhất</div>
            <h3 class="quiz-result-name-hud">${prog.program_name_degree || prog.name}</h3>
            <p class="quiz-result-desc-hud">${prog.description || prog.tagline}</p>
            <div class="quiz-result-meta-hud">
                <span><i class="fa-solid fa-building-columns"></i> ${prog.school} (${prog.country})</span>
                <span><i class="fa-regular fa-clock"></i> Thời gian: ${prog.duration}</span>
                <span><i class="fa-solid fa-graduation-cap"></i> Cấu trúc: ${prog.subjects}</span>
                <span><i class="fa-solid fa-credit-card"></i> Học phí: ${prog.fee_course[0]?.price}</span>
            </div>
        `;

        // Bind CTA consultation
        const ctaBtn = document.getElementById('quiz-result-cta');
        ctaBtn.setAttribute('data-program', prog.name);

        // Bind 3D Explorer Tween Node
        const exploreBtn = document.getElementById('quiz-result-explore');
        exploreBtn.onclick = () => {
            quizPanel.classList.add('hidden');
            selectProgramNode(recommendedId);
        };

        document.getElementById('quiz-result-hud').style.display = 'flex';
    }

    // Reset Quiz state when entering from nav
    window.resetPathfinderQuiz = function() {
        currentStep = 1;
        quizSteps.forEach(s => s.classList.remove('active'));
        quizSteps[0].classList.add('active');
        
        quizSteps.forEach(step => {
            step.querySelectorAll('.quiz-option-hud').forEach(opt => opt.classList.remove('selected'));
        });

        quizAnswers.education = null;
        quizAnswers.experience = null;
        quizAnswers.objective = null;

        btnNext.disabled = true;
        btnNext.textContent = 'Tiếp theo';
        btnNext.style.display = 'block';
        btnPrev.style.visibility = 'hidden';
        btnPrev.style.display = 'block';
        document.querySelector('.quiz-footer-hud').style.display = 'flex';
        progressFill.style.width = '0%';

        document.getElementById('quiz-result-hud').style.display = 'none';
    };

    document.getElementById('nav-btn-quiz').addEventListener('click', () => {
        resetPathfinderQuiz();
    });

    // ════════════════════════════════════════════
    // EXECUTION & INTEGRATION
    // ════════════════════════════════════════════
    
    // Prefill Booking Form Program Name Hook
    function setSelectedProgramInBookingModal(programName) {
        const grid = document.getElementById('bk-program-grid');
        if (!grid) return;
        
        // Remove previous custom program card
        const customCard = grid.querySelector('.bk-program-card-custom');
        if (customCard) customCard.remove();
        
        if (programName) {
            const cardHTML = `
                <label class="bk-program-card bk-program-card-custom">
                    <input type="radio" name="bk-program" value="${programName}" checked />
                    <div class="bk-program-inner">
                        <div class="bk-program-icon">🎓</div>
                        <div class="bk-program-name">${programName}</div>
                        <div class="bk-program-desc">Chương trình tuyển chọn</div>
                    </div>
                </label>
            `;
            grid.insertAdjacentHTML('afterbegin', cardHTML);
        } else {
            const defaultRadio = grid.querySelector('input[value="MBA High Quality"]');
            if (defaultRadio) defaultRadio.checked = true;
        }
    }

    // Event delegation for booking clicks
    document.addEventListener('click', (e) => {
        const btn = e.target.closest('.bk-open-btn');
        if (btn) {
            const progName = btn.getAttribute('data-program');
            setSelectedProgramInBookingModal(progName || '');
            
            // Auto close compare modal if booking triggers from inside it
            closeCompareModal();
        }
    });

    // Initialize systems
    initThree();
    bindUiControls();
    buildCompareMatrix();
    initQuiz();
});
