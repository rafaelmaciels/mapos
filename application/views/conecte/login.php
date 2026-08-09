<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>RM. Sollutions | Assistência Técnica Especializada & Soluções em Tecnologia</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="RM. Sollutions - Assistência Técnica Especializada em Celulares, Computadores, Notebooks e Impressoras. Energia para Soluções com conhecimento técnico e confiança.">
    <meta name="keywords" content="assistência técnica, manutenção celular, conserto notebook, formatação computador, manutenção impressora, recuperação de dados, RM Sollutions">
    
    <!-- Open Graph / Meta Social -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="RM. Sollutions | Assistência Técnica Especializada">
    <meta property="og:description" content="Manutenção de Celulares, Computadores, Notebooks e Impressoras. Tecnologia com conhecimento técnico e confiança.">
    <meta property="og:image" content="<?= base_url('assets/img/logo-rmsollutions.png') ?>">

    <meta name="csrf-token-name" content="<?= config_item("csrf_token_name") ?>">
    <meta name="csrf-cookie-name" content="<?= config_item("csrf_cookie_name") ?>">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS Assets -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/rmsollutions-mine.css" />
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.png">

    <!-- JS Dependencies -->
    <script src="<?php echo base_url() ?>assets/js/jquery-1.12.4.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/funcoes.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/js/funcoesGlobal.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/js/csrf.js"></script>
</head>

<?php
$parse_email = $this->input->get('e');
$nome_empresa = isset($emitente->nome) && !empty($emitente->nome) ? $emitente->nome : 'RM. Sollutions';
$telefone_empresa = isset($emitente->telefone) && !empty($emitente->telefone) ? $emitente->telefone : '(11) 99999-9999';
$email_empresa = isset($emitente->email) && !empty($emitente->email) ? $emitente->email : 'contato@rmsollutions.com.br';
$endereco_empresa = isset($emitente->rua) && !empty($emitente->rua) ? $emitente->rua . ', ' . $emitente->numero . ' - ' . $emitente->bairro : 'Atendimento Especializado';
?>

<body class="rms-landing-body">

    <!-- ==========================================
         1. HEADER & NAVIGATION
         ========================================== -->
    <header class="rms-header">
        <div class="rms-container">
            <div class="rms-nav-wrapper">
                <a href="#inicio" class="rms-brand" title="RM. Sollutions">
                    <img src="<?php echo base_url('assets/img/logo-rmsollutions.png'); ?>" alt="RM. Sollutions Logo" class="rms-brand-logo">
                </a>

                <ul class="rms-nav-links">
                    <li><a href="#inicio">Início</a></li>
                    <li><a href="#servicos">Serviços</a></li>
                    <li><a href="#equipamentos">Equipamentos</a></li>
                    <li><a href="#diferenciais">Diferenciais</a></li>
                    <li><a href="#sobre">Sobre</a></li>
                    <li><a href="#contato">Contato</a></li>
                </ul>

                <div class="rms-nav-actions" style="display: flex; align-items: center; gap: 1rem;">
                    <a href="#login-section" class="rms-btn rms-btn-primary" style="padding: 0.65rem 1.2rem; font-size: 0.9rem;">
                        <i class='bx bx-user-check'></i> Área do Cliente
                    </a>

                    <button class="rms-mobile-toggle" id="rmsMobileToggle" aria-label="Abrir Menu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Drawer -->
        <nav class="rms-mobile-menu" id="rmsMobileMenu">
            <a href="#inicio" class="rms-mobile-link">Início</a>
            <a href="#servicos" class="rms-mobile-link">Serviços</a>
            <a href="#equipamentos" class="rms-mobile-link">Equipamentos</a>
            <a href="#diferenciais" class="rms-mobile-link">Diferenciais</a>
            <a href="#sobre" class="rms-mobile-link">Sobre</a>
            <a href="#contato" class="rms-mobile-link">Contato</a>
            <a href="#login-section" class="rms-btn rms-btn-primary rms-btn-full rms-mobile-link" style="margin-top: 0.5rem;">
                <i class='bx bx-user-check'></i> Área do Cliente
            </a>
        </nav>
    </header>


    <!-- ==========================================
         2. HERO SECTION
         ========================================== -->
    <section id="inicio" class="rms-hero">
        <div class="rms-container">
            <div class="rms-hero-grid">
                <div class="rms-hero-content">
                    <div class="rms-tag">
                        <span class="rms-capacitor-dot"></span>
                        ENERGIA PARA SOLUÇÕES
                    </div>
                    
                    <h1 class="rms-hero-title">
                        Assistência Técnica Especializada em <span class="rms-text-gradient">Tecnologia & Eletrônica</span>
                    </h1>

                    <p class="rms-hero-description">
                        Manutenção, diagnóstico e reparos de alta precisão para Celulares, Computadores, Notebooks e Impressoras. Transparência, conhecimento técnico e atendimento rápido.
                    </p>

                    <div class="rms-hero-actions">
                        <a href="#servicos" class="rms-btn rms-btn-primary">
                            <i class='bx bx-wrench'></i> Conheça Nossos Serviços
                        </a>
                        <a href="#login-section" class="rms-btn rms-btn-secondary">
                            <i class='bx bx-user'></i> Já Sou Cliente
                        </a>
                    </div>

                    <div class="rms-hero-badges">
                        <div class="rms-hero-badge-item">
                            <i class='bx bx-mobile-alt'></i> Celulares
                        </div>
                        <div class="rms-hero-badge-item">
                            <i class='bx bx-laptop'></i> Notebooks & Desktops
                        </div>
                        <div class="rms-hero-badge-item">
                            <i class='bx bx-printer'></i> Impressoras
                        </div>
                        <div class="rms-hero-badge-item">
                            <i class='bx bx-shield-quarter'></i> TV Box & Software
                        </div>
                    </div>
                </div>

                <div class="rms-hero-visual">
                    <img src="<?php echo base_url('assets/img/logo-rmsollutions.png'); ?>" alt="RM. Sollutions Assistência Técnica" class="rms-hero-banner-img">
                </div>
            </div>
        </div>
    </section>


    <!-- ==========================================
         3. SERVIÇOS
         ========================================== -->
    <section id="servicos" class="rms-section rms-section-alt">
        <div class="rms-container">
            <div class="rms-section-header">
                <div class="rms-tag">
                    <span class="rms-capacitor-dot"></span>
                    SOLUÇÕES ESPECIALIZADAS
                </div>
                <h2 class="rms-title-md">Nossos Serviços</h2>
                <p class="rms-subtitle">Oferecemos suporte técnico completo para manter seus dispositivos funcionando com máximo desempenho.</p>
            </div>

            <div class="rms-grid-4">
                <!-- Card 1 -->
                <div class="rms-card">
                    <div class="rms-card-icon">
                        <i class='bx bx-mobile-alt'></i>
                    </div>
                    <h3 class="rms-card-title">Manutenção de Celulares</h3>
                    <p class="rms-card-text">Troca de tela, substituição de bateria, reparos em conectores de carga e manutenção avançada em placas de smartphones.</p>
                </div>

                <!-- Card 2 -->
                <div class="rms-card">
                    <div class="rms-card-icon">
                        <i class='bx bx-laptop'></i>
                    </div>
                    <h3 class="rms-card-title">Formatação & Otimização</h3>
                    <p class="rms-card-text">Instalação limpa de sistema operacional, atualização de drivers, limpeza interna física, troca de pasta térmica e upgrades (SSD/RAM).</p>
                </div>

                <!-- Card 3 -->
                <div class="rms-card">
                    <div class="rms-card-icon">
                        <i class='bx bx-folder-open'></i>
                    </div>
                    <h3 class="rms-card-title">Recuperação de Arquivos</h3>
                    <p class="rms-card-text">Serviços técnicos de recuperação de dados em HDs, SSDs e pendrives, respeitando viabilidade técnica com sigilo total.</p>
                </div>

                <!-- Card 4 -->
                <div class="rms-card">
                    <div class="rms-card-icon">
                        <i class='bx bx-shield-quarter'></i>
                    </div>
                    <h3 class="rms-card-title">Remoção de Vírus</h3>
                    <p class="rms-card-text">Diagnóstico profundo para eliminação de vírus, malwares, trojans e softwares maliciosos que prejudicam o computador.</p>
                </div>

                <!-- Card 5 -->
                <div class="rms-card">
                    <div class="rms-card-icon">
                        <i class='bx bx-tv'></i>
                    </div>
                    <h3 class="rms-card-title">Recuperação de TV Box</h3>
                    <p class="rms-card-text">Manutenção técnica especializada, recuperação de sistema travado e atualização de firmwares em dispositivos TV Box.</p>
                </div>

                <!-- Card 6 -->
                <div class="rms-card">
                    <div class="rms-card-icon">
                        <i class='bx bx-cog'></i>
                    </div>
                    <h3 class="rms-card-title">Ativação Windows & Office</h3>
                    <p class="rms-card-text">Configuração, ativação e otimização de suíte de escritório e sistema operacional conforme diretrizes de licenciamento.</p>
                </div>

                <!-- Card 7 -->
                <div class="rms-card">
                    <div class="rms-card-icon">
                        <i class='bx bx-printer'></i>
                    </div>
                    <h3 class="rms-card-title">Manutenção de Impressoras</h3>
                    <p class="rms-card-text">Limpeza de cabeçotes, desobstrução, alinhamento, reparos mecânicos e manutenção preventiva para impressoras.</p>
                </div>

                <!-- Card 8 -->
                <div class="rms-card">
                    <div class="rms-card-icon">
                        <i class='bx bx-copy-alt'></i>
                    </div>
                    <h3 class="rms-card-title">Xerox & Digitalização</h3>
                    <p class="rms-card-text">Serviços rápidos de cópias, Xerox, digitalização de documentos em alta resolução e impressões de arquivos.</p>
                </div>
            </div>
        </div>
    </section>


    <!-- ==========================================
         4. EQUIPAMENTOS ATENDIDOS
         ========================================== -->
    <section id="equipamentos" class="rms-section">
        <div class="rms-container">
            <div class="rms-section-header">
                <div class="rms-tag">
                    <span class="rms-capacitor-dot"></span>
                    TECNOLOGIA MULTIMARCAS
                </div>
                <h2 class="rms-title-md">Equipamentos Atendidos</h2>
                <p class="rms-subtitle">Trabalhamos com as principais marcas e modelos do mercado com garantia e peças de qualidade.</p>
            </div>

            <div class="rms-grid-3">
                <div class="rms-equip-card">
                    <div class="rms-equip-icon">📱</div>
                    <div>
                        <h3 class="rms-card-title" style="margin-bottom: 0.2rem;">Celulares & Smartphones</h3>
                        <p class="rms-card-text">Android e iOS (Samsung, Apple, Motorola, Xiaomi, etc.)</p>
                    </div>
                </div>

                <div class="rms-equip-card">
                    <div class="rms-equip-icon">💻</div>
                    <div>
                        <h3 class="rms-card-title" style="margin-bottom: 0.2rem;">Computadores & Notebooks</h3>
                        <p class="rms-card-text">Desktops, All-in-One e Laptops de todas as fabricantes</p>
                    </div>
                </div>

                <div class="rms-equip-card">
                    <div class="rms-equip-icon">🖨️</div>
                    <div>
                        <h3 class="rms-card-title" style="margin-bottom: 0.2rem;">Impressoras & Multifuncionais</h3>
                        <p class="rms-card-text">Epson, HP, Canon, Brother e modelos tanque de tinta</p>
                    </div>
                </div>

                <div class="rms-equip-card">
                    <div class="rms-equip-icon">📺</div>
                    <div>
                        <h3 class="rms-card-title" style="margin-bottom: 0.2rem;">Dispositivos TV Box</h3>
                        <p class="rms-card-text">Recuperação de firmware, fontes e conectores</p>
                    </div>
                </div>

                <div class="rms-equip-card">
                    <div class="rms-equip-icon">💾</div>
                    <div>
                        <h3 class="rms-card-title" style="margin-bottom: 0.2rem;">Armazenamento & Mídias</h3>
                        <p class="rms-card-text">HDs internos/externos, SSDs, Cartões de Memória e Pendrives</p>
                    </div>
                </div>

                <div class="rms-equip-card">
                    <div class="rms-equip-icon">📄</div>
                    <div>
                        <h3 class="rms-card-title" style="margin-bottom: 0.2rem;">Documentos & Cópias</h3>
                        <p class="rms-card-text">Impressão, digitalização e cópias de documentos</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ==========================================
         5. DIFERENCIAIS
         ========================================== -->
    <section id="diferenciais" class="rms-section rms-section-alt">
        <div class="rms-container">
            <div class="rms-section-header">
                <div class="rms-tag">
                    <span class="rms-capacitor-dot"></span>
                    POR QUE A RM. SOLLUTIONS?
                </div>
                <h2 class="rms-title-md">Nossos Diferenciais</h2>
                <p class="rms-subtitle">Compromisso técnico e transparência em cada atendimento efetuado.</p>
            </div>

            <div class="rms-grid-4">
                <div class="rms-card">
                    <div class="rms-card-icon">⚡</div>
                    <h3 class="rms-card-title">Energia para Soluções</h3>
                    <p class="rms-card-text">Agilidade e determinação para encontrar a melhor solução técnica para seu problema.</p>
                </div>

                <div class="rms-card">
                    <div class="rms-card-icon">🔧</div>
                    <h3 class="rms-card-title">Conhecimento Técnico</h3>
                    <p class="rms-card-text">Especialização em eletrônica e tecnologia aplicada com diagnóstico preciso e correto.</p>
                </div>

                <div class="rms-card">
                    <div class="rms-card-icon">💻</div>
                    <h3 class="rms-card-title">Tecnologia de Ponta</h3>
                    <p class="rms-card-text">Utilização de instrumentos modernos para testes, soldas e reparos de precisão.</p>
                </div>

                <div class="rms-card">
                    <div class="rms-card-icon">🤝</div>
                    <h3 class="rms-card-title">Atendimento Transparente</h3>
                    <p class="rms-card-text">Comunicação clara e acompanhamento online do andamento de sua Ordem de Serviço.</p>
                </div>
            </div>
        </div>
    </section>


    <!-- ==========================================
         6. COMO FUNCIONA
         ========================================== -->
    <section id="como-funciona" class="rms-section">
        <div class="rms-container">
            <div class="rms-section-header">
                <div class="rms-tag">
                    <span class="rms-capacitor-dot"></span>
                    PASSO A PASSO
                </div>
                <h2 class="rms-title-md">Como Funciona o Atendimento</h2>
                <p class="rms-subtitle">Processo simples, rápido e transparente do início à entrega.</p>
            </div>

            <div class="rms-grid-4" style="grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));">
                <div class="rms-step-card">
                    <div class="rms-step-num">01</div>
                    <h3 class="rms-card-title">Contato Inicial</h3>
                    <p class="rms-card-text">Você entra em contato e nos informa qual equipamento precisa de atendimento.</p>
                </div>

                <div class="rms-step-card">
                    <div class="rms-step-num">02</div>
                    <h3 class="rms-card-title">Diagnóstico</h3>
                    <p class="rms-card-text">Realizamos a análise técnica detalhada do problema em nosso laboratório.</p>
                </div>

                <div class="rms-step-card">
                    <div class="rms-step-num">03</div>
                    <h3 class="rms-card-title">Orçamento</h3>
                    <p class="rms-card-text">Apresentamos a solução técnica ideal e o orçamento transparente para sua aprovação.</p>
                </div>

                <div class="rms-step-card">
                    <div class="rms-step-num">04</div>
                    <h3 class="rms-card-title">Execução & Testes</h3>
                    <p class="rms-card-text">Executamos o reparo com peças de qualidade e realizamos testes de validação.</p>
                </div>

                <div class="rms-step-card">
                    <div class="rms-step-num">05</div>
                    <h3 class="rms-card-title">Acompanhamento</h3>
                    <p class="rms-card-text">Você acompanha tudo em tempo real através da nossa Área do Cliente online.</p>
                </div>
            </div>
        </div>
    </section>


    <!-- ==========================================
         7. HISTÓRIA DA MARCA
         ========================================== -->
    <section id="sobre" class="rms-section rms-section-alt">
        <div class="rms-container">
            <div class="rms-history-box">
                <div class="rms-section-header" style="margin-bottom: 2rem;">
                    <div class="rms-tag">
                        <span class="rms-capacitor-dot"></span>
                        HISTÓRIA & PROPÓSITO
                    </div>
                    <h2 class="rms-title-md">A História por trás da RM. Sollutions</h2>
                    <p class="rms-subtitle">Uma marca construída com autoria, inspiração pessoal e paixão pela tecnologia.</p>
                </div>

                <div style="max-width: 860px; margin: 0 auto; color: var(--rms-text-muted); line-height: 1.8; font-size: 1.025rem;">
                    <p style="margin-bottom: 1.25rem;">
                        A <strong style="color: #ffffff;">RM. Sollutions</strong> nasceu com o propósito de oferecer soluções reais em tecnologia e assistência técnica com honestidade e excelência técnica.
                    </p>
                    
                    <div class="rms-history-pillars">
                        <div class="rms-pillar-item">
                            <div class="rms-pillar-badge">RM.</div>
                            <h4 style="color: #ffffff; margin: 0.2rem 0 0.2rem 0;">Iniciais do Fundador</h4>
                            <p style="font-size: 0.9rem; margin: 0; color: var(--rms-text-muted);">Representa identidade pessoal, autoria, responsabilidade direta e compromisso com o cliente.</p>
                        </div>

                        <div class="rms-pillar-item">
                            <div class="rms-pillar-badge">SOLLUTIONS</div>
                            <h4 style="color: #ffffff; margin: 0.2rem 0 0.2rem 0;">Homenagem com Propósito</h4>
                            <p style="font-size: 0.9rem; margin: 0; color: var(--rms-text-muted);">A grafia com dois "L" é intencional: <strong>SOL + LUTIONS</strong>, uma linda homenagem à filha MariSol.</p>
                        </div>

                        <div class="rms-pillar-item">
                            <div class="rms-pillar-badge">PONTO AZUL</div>
                            <h4 style="color: #ffffff; margin: 0.2rem 0 0.2rem 0;">Capacitor Eletrônico</h4>
                            <p style="font-size: 0.9rem; margin: 0; color: var(--rms-text-muted);">O ponto azul no "RM." é inspirado em um capacitor eletrônico: o elemento que armazena e fornece <strong>Energia para Soluções</strong>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ==========================================
         8. ÁREA DO CLIENTE / LOGIN (FUNCIONALIDADE PRESERVADA)
         ========================================== -->
    <section id="login-section" class="rms-login-section">
        <div class="rms-container">
            <div class="rms-section-header">
                <div class="rms-tag">
                    <span class="rms-capacitor-dot"></span>
                    PORTAL DO CLIENTE
                </div>
                <h2 class="rms-title-md">Área do Cliente</h2>
                <p class="rms-subtitle">Acesse sua conta para acompanhar o andamento da sua Ordem de Serviço, compras e solicitações em tempo real.</p>
            </div>

            <div class="rms-login-wrapper" id="loginbox">
                <div class="rms-login-card">
                    <div class="rms-login-header">
                        <img src="<?php echo base_url('assets/img/logo-rmsollutions.png'); ?>" alt="RM. Sollutions" class="rms-login-logo">
                        <p style="color: var(--rms-text-muted); font-size: 0.9rem;">Insira suas credenciais para entrar no sistema</p>
                    </div>

                    <form id="formLogin" method="post" action="<?php echo site_url() ?>/mine/login">
                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">

                        <div class="rms-form-group">
                            <label for="email" class="rms-form-label">E-mail do Cliente</label>
                            <div class="rms-input-container">
                                <i class='bx bx-envelope rms-input-icon'></i>
                                <input id="email" name="email" type="email" class="rms-input" placeholder="seuemail@exemplo.com" value="<?php echo trim($parse_email); ?>" required />
                            </div>
                        </div>

                        <div class="rms-form-group">
                            <label for="senha" class="rms-form-label">Senha de Acesso</label>
                            <div class="rms-input-container">
                                <i class='bx bx-lock-alt rms-input-icon'></i>
                                <input id="senha" name="senha" type="password" class="rms-input" placeholder="••••••••" value="" required />
                                <button type="button" class="rms-password-toggle" id="togglePasswordBtn" title="Mostrar/Ocultar Senha">
                                    <i class='bx bx-show' id="togglePasswordIcon"></i>
                                </button>
                            </div>
                        </div>

                        <div class="rms-login-actions">
                            <button type="submit" class="rms-btn rms-btn-primary rms-btn-full" id="btnAcessar">
                                <i class='bx bx-log-in-circle'></i> Acessar Conta
                            </button>

                            <a href="<?= site_url('mine/cadastrar') ?>" class="rms-btn rms-btn-secondary rms-btn-full">
                                <i class='bx bx-user-plus'></i> Cadastrar-me
                            </a>
                        </div>

                        <div class="rms-login-footer-links">
                            <a href="<?= site_url('mine/resetarSenha') ?>">
                                <i class='bx bx-key'></i> Esqueceu a senha?
                            </a>
                            <span style="color: var(--rms-text-dim);">Versão <?= $this->config->item('app_version'); ?></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <!-- ==========================================
         9. CONTATO & CTA FINAL
         ========================================== -->
    <section id="contato" class="rms-section">
        <div class="rms-container">
            <div class="rms-contact-bar">
                <div>
                    <h3 class="rms-title-md" style="font-size: 1.5rem; margin-bottom: 0.3rem;">Precisa de assistência técnica agora?</h3>
                    <p style="color: var(--rms-text-muted);">Entre em contato conosco ou traga seu equipamento para um diagnóstico técnico profissional.</p>
                </div>

                <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                    <a href="https://api.whatsapp.com/send?phone=55<?php echo preg_replace('/[^0-9]/', '', $telefone_empresa); ?>&text=Ol%C3%A1!%20Gostaria%20de%20solicitar%20um%20atendimento%20t%C3%A9cnico." target="_blank" class="rms-btn rms-btn-primary">
                        <i class='bx bxl-whatsapp' style="font-size: 1.25rem;"></i> Falar no WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </section>


    <!-- ==========================================
         10. FOOTER INSTITUCIONAL
         ========================================== -->
    <footer class="rms-footer">
        <div class="rms-container">
            <div class="rms-footer-grid">
                <div class="rms-footer-brand">
                    <img src="<?php echo base_url('assets/img/logo-rmsollutions.png'); ?>" alt="RM. Sollutions" style="height: 42px;">
                    <p>Assistência Técnica Especializada em Celulares, Computadores, Notebooks e Impressoras. Energia para Soluções em Tecnologia.</p>
                </div>

                <div class="rms-footer-links">
                    <h4>Links Rápidos</h4>
                    <ul>
                        <li><a href="#inicio">Início</a></li>
                        <li><a href="#servicos">Serviços</a></li>
                        <li><a href="#equipamentos">Equipamentos</a></li>
                        <li><a href="#sobre">História da Marca</a></li>
                        <li><a href="#login-section">Área do Cliente</a></li>
                    </ul>
                </div>

                <div class="rms-footer-links">
                    <h4>Contato</h4>
                    <ul>
                        <li><i class='bx bx-phone' style="color: var(--rms-blue-neon);"></i> <?= html_escape($telefone_empresa); ?></li>
                        <li><i class='bx bx-envelope' style="color: var(--rms-blue-neon);"></i> <?= html_escape($email_empresa); ?></li>
                        <li><i class='bx bx-map-pin' style="color: var(--rms-blue-neon);"></i> <?= html_escape($endereco_empresa); ?></li>
                    </ul>
                </div>
            </div>

            <div class="rms-footer-bottom">
                <p>&copy; <?= date('Y'); ?> RM. Sollutions — Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>


    <!-- ==========================================
         SCRIPTS & LÓGICA DE LOGIN INTACTA
         ========================================== -->
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>
    <script src="<?php echo base_url() ?>assets/js/sweetalert2.all.min.js"></script>

    <?php if ($this->session->flashdata('success') != null) { ?>
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: '<?php echo $this->session->flashdata('success'); ?>',
                showConfirmButton: false,
                timer: 4000
            })
        </script>
    <?php } ?>

    <?php if ($this->session->flashdata('error') != null) { ?>
        <script>
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: '<?php echo $this->session->flashdata('error'); ?>',
                showConfirmButton: false,
                timer: 4000
            })
        </script>
    <?php } ?>

    <script type="text/javascript">
        $(document).ready(function() {

            // Mobile Menu Drawer Toggle
            $('#rmsMobileToggle').on('click', function() {
                $('#rmsMobileMenu').toggleClass('active');
            });

            $('.rms-mobile-link').on('click', function() {
                $('#rmsMobileMenu').removeClass('active');
            });

            // Toggle Password Visibility
            $('#togglePasswordBtn').on('click', function() {
                var passwordInput = $('#senha');
                var icon = $('#togglePasswordIcon');
                
                if (passwordInput.attr('type') === 'password') {
                    passwordInput.attr('type', 'text');
                    icon.removeClass('bx-show').addClass('bx-hide');
                } else {
                    passwordInput.attr('type', 'password');
                    icon.removeClass('bx-hide').addClass('bx-show');
                }
            });

            // Existing Login Validation & AJAX (PRESERVED LOGIC)
            $("#formLogin").validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    senha: {
                        required: true
                    }
                },
                messages: {
                    email: {
                        required: 'Por favor, informe seu e-mail.',
                        email: 'Insira um e-mail válido.'
                    },
                    senha: {
                        required: 'Por favor, informe sua senha.'
                    }
                },
                submitHandler: function(form) {
                    var csrfName = '<?= $this->security->get_csrf_token_name(); ?>';
                    var csrfCookieName = '<?= config_item("csrf_cookie_name") ?>';
                    var cookieToken = getCookie(csrfCookieName);

                    if (cookieToken && cookieToken !== 'undefined') {
                        $(form).find('input[name="' + csrfName + '"]').val(cookieToken);
                    }

                    var dados = $(form).serialize();
                    var $btn = $('#btnAcessar');
                    var originalHtml = $btn.html();

                    $btn.html("<i class='bx bx-loader-alt bx-spin'></i> Autenticando...").prop('disabled', true);

                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>index.php/mine/login?ajax=true",
                        data: dados,
                        dataType: 'json',
                        success: function(data) {
                            $btn.html(originalHtml).prop('disabled', false);

                            if (data.result == true) {
                                window.location.href = "<?php echo base_url(); ?>index.php/mine/painel";
                            } else {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'error',
                                    title: data.message || 'Os dados de acesso estão incorretos.\nPor favor, tente novamente!',
                                    showConfirmButton: false,
                                    timer: 4000
                                });

                                if (data.MAPOS_TOKEN) {
                                    $("input[name='" + csrfName + "']").val(data.MAPOS_TOKEN);
                                    document.cookie = csrfCookieName + '=' + data.MAPOS_TOKEN + '; path=/';
                                }
                            }
                        },
                        error: function() {
                            $btn.html(originalHtml).prop('disabled', false);
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'Ocorreu um erro ao processar o login. Tente novamente.',
                                showConfirmButton: false,
                                timer: 4000
                            });
                        }
                    });

                    return false;
                },

                errorClass: "help-inline",
                errorElement: "span",
                highlight: function(element, errorClass, validClass) {
                    $(element).parents('.rms-form-group').addClass('error');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).parents('.rms-form-group').removeClass('error');
                }
            });

        });
    </script>
</body>

</html>
