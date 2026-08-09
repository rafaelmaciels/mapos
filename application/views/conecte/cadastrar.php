<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>RM. Sollutions | Criar sua Conta - Cadastro de Cliente</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="RM. Sollutions - Cadastre-se no Portal do Cliente para acompanhar suas Ordens de Serviço, atendimentos e solicitações em tempo real.">
    <meta name="keywords" content="cadastro cliente, área do cliente, RM Sollutions, assistência técnica, ordem de serviço">
    
    <!-- Open Graph / Meta Social -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="RM. Sollutions | Criar sua Conta">
    <meta property="og:description" content="Cadastre-se no Portal do Cliente RM. Sollutions.">
    <meta property="og:image" content="<?= base_url('assets/img/logo-rmsollutions.png') ?>">

    <meta name="csrf-token-name" content="<?= config_item("csrf_token_name") ?>">
    <meta name="csrf-cookie-name" content="<?= config_item("csrf_cookie_name") ?>">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS Assets -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/rmsollutions-mine.css" />
    <link href="<?= base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/img/favicon.png">

    <!-- JS Dependencies (Head) -->
    <script src="<?= base_url() ?>assets/js/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/js/funcoesGlobal.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/js/csrf.js"></script>
</head>

<?php
$nome_empresa = isset($emitente->nome) && !empty($emitente->nome) ? $emitente->nome : 'RM. Sollutions';
$telefone_empresa = isset($emitente->telefone) && !empty($emitente->telefone) ? $emitente->telefone : '(83) 98165-7796';
$email_empresa = isset($emitente->email) && !empty($emitente->email) ? $emitente->email : 'contato@rafaelmaciel.net';
$endereco_empresa = isset($emitente->rua) && !empty($emitente->rua) ? $emitente->rua . ', ' . $emitente->numero . ' - ' . $emitente->bairro : 'Atendimento Especializado';
?>

<body class="rms-landing-body">

    <!-- ==========================================
         1. HEADER & NAVIGATION
         ========================================== -->
    <header class="rms-header">
        <div class="rms-container">
            <div class="rms-nav-wrapper">
                <a href="<?= site_url('mine') ?>" class="rms-brand" title="RM. Sollutions">
                    <img src="<?= base_url('assets/img/logo-rmsollutions.png'); ?>" alt="RM. Sollutions Logo" class="rms-brand-logo">
                </a>

                <ul class="rms-nav-links">
                    <li><a href="<?= site_url('mine') ?>#inicio">Início</a></li>
                    <li><a href="<?= site_url('mine') ?>#servicos">Serviços</a></li>
                    <li><a href="<?= site_url('mine') ?>#equipamentos">Equipamentos</a></li>
                    <li><a href="<?= site_url('mine') ?>#diferenciais">Diferenciais</a></li>
                    <li><a href="<?= site_url('mine') ?>#sobre">Sobre</a></li>
                    <li><a href="<?= site_url('mine') ?>#contato">Contato</a></li>
                </ul>

                <div class="rms-nav-actions" style="display: flex; align-items: center; gap: 1rem;">
                    <a href="<?= site_url('mine') ?>#login-section" class="rms-btn rms-btn-primary" style="padding: 0.65rem 1.2rem; font-size: 0.9rem;">
                        <i class='bx bx-user-check'></i> Já sou Cliente
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
            <a href="<?= site_url('mine') ?>#inicio" class="rms-mobile-link">Início</a>
            <a href="<?= site_url('mine') ?>#servicos" class="rms-mobile-link">Serviços</a>
            <a href="<?= site_url('mine') ?>#equipamentos" class="rms-mobile-link">Equipamentos</a>
            <a href="<?= site_url('mine') ?>#diferenciais" class="rms-mobile-link">Diferenciais</a>
            <a href="<?= site_url('mine') ?>#sobre" class="rms-mobile-link">Sobre</a>
            <a href="<?= site_url('mine') ?>#contato" class="rms-mobile-link">Contato</a>
            <a href="<?= site_url('mine') ?>#login-section" class="rms-btn rms-btn-primary rms-btn-full rms-mobile-link" style="margin-top: 0.5rem;">
                <i class='bx bx-user-check'></i> Já sou Cliente
            </a>
        </nav>
    </header>


    <!-- ==========================================
         2. FORMULÁRIO DE CADASTRO DE CLIENTE
         ========================================== -->
    <section class="rms-register-section">
        <div class="rms-container">
            
            <div class="rms-section-header">
                <div class="rms-tag">
                    <span class="rms-capacitor-dot"></span>
                    NOVO CADASTRO DE CLIENTE
                </div>
                <h1 class="rms-title-lg">CRIAR SUA CONTA</h1>
                <p class="rms-subtitle">Cadastre-se para acompanhar seus atendimentos, Ordens de Serviço e solicitações em tempo real.</p>
            </div>

            <div class="rms-register-wrapper">
                <div class="rms-register-card">
                    
                    <?php if (isset($custom_error) && $custom_error != '') { ?>
                        <div class="rms-alert rms-alert-danger">
                            <i class='bx bx-error-circle' style="font-size: 1.5rem; flex-shrink: 0;"></i>
                            <div><?= $custom_error ?></div>
                        </div>
                    <?php } ?>

                    <form action="<?= current_url() ?>" id="formCliente" method="post" class="form-horizontal">
                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">

                        <!-- BLOS 1: DADOS PESSOAIS & ACESSO -->
                        <div class="rms-form-section-header">
                            <i class='bx bx-user-pin'></i> <span>Dados Pessoais & Acesso</span>
                        </div>

                        <div class="rms-form-grid-2">
                            
                            <!-- Nome Completo -->
                            <div class="control-group rms-form-group">
                                <label for="nomeCliente" class="rms-form-label">Nome Completo <span class="rms-required">*</span></label>
                                <div class="rms-input-container controls">
                                    <i class='bx bx-user rms-input-icon'></i>
                                    <input id="nomeCliente" type="text" class="rms-input" placeholder="Seu nome completo" name="nomeCliente" value="<?= set_value('nomeCliente') ?>" required />
                                </div>
                            </div>

                            <!-- CPF / CNPJ -->
                            <div class="control-group rms-form-group">
                                <label for="documento" class="rms-form-label">CPF ou CNPJ <span class="rms-required">*</span></label>
                                <div class="rms-input-container controls">
                                    <i class='bx bx-id-card rms-input-icon'></i>
                                    <input id="documento" class="cpfcnpj rms-input" type="text" placeholder="CPF ou CNPJ" name="documento" value="<?= set_value('documento') ?>" required />
                                    <button id="buscar_info_cnpj" class="rms-input-action-btn" type="button" title="Buscar dados por CNPJ">
                                        <i class='bx bx-search-alt-2'></i> <span>CNPJ</span>
                                    </button>
                                </div>
                            </div>

                            <!-- E-mail -->
                            <div class="control-group rms-form-group">
                                <label for="email" class="rms-form-label">E-mail de Acesso <span class="rms-required">*</span></label>
                                <div class="rms-input-container controls">
                                    <i class='bx bx-envelope rms-input-icon'></i>
                                    <input id="email" type="email" class="rms-input" placeholder="seuemail@exemplo.com" name="email" value="<?= set_value('email') ?>" required />
                                </div>
                            </div>

                            <!-- Senha -->
                            <div class="control-group rms-form-group">
                                <label for="senha" class="rms-form-label">Senha de Acesso <span class="rms-required">*</span></label>
                                <div class="rms-input-container controls">
                                    <i class='bx bx-lock-alt rms-input-icon'></i>
                                    <input id="senha" type="password" class="rms-input" placeholder="••••••••" name="senha" value="<?= set_value('senha') ?>" required />
                                    <span class="rms-password-toggle" id="togglePasswordBtn" title="Mostrar/Ocultar Senha">
                                        <img id="imgSenha" src="<?= base_url() ?>assets/img/eye.svg" alt="Mostrar Senha" style="width: 20px; filter: invert(0.8);">
                                    </span>
                                </div>
                            </div>

                            <!-- Telefone -->
                            <div class="control-group rms-form-group">
                                <label for="telefone" class="rms-form-label">Telefone Principal <span class="rms-required">*</span></label>
                                <div class="rms-input-container controls">
                                    <i class='bx bx-phone rms-input-icon'></i>
                                    <input id="telefone" type="text" class="rms-input" placeholder="(00) 0000-0000" name="telefone" value="<?= set_value('telefone') ?>" required />
                                </div>
                            </div>

                            <!-- Celular -->
                            <div class="control-group rms-form-group">
                                <label for="celular" class="rms-form-label">Celular / WhatsApp</label>
                                <div class="rms-input-container controls">
                                    <i class='bx bx-mobile-alt rms-input-icon'></i>
                                    <input id="celular" type="text" class="rms-input" placeholder="(00) 00000-0000" name="celular" value="<?= set_value('celular') ?>" />
                                </div>
                            </div>

                            <!-- Contato -->
                            <div class="control-group rms-form-group rms-form-grid-full">
                                <label for="contato" class="rms-form-label">Pessoa de Contato / Referência</label>
                                <div class="rms-input-container controls">
                                    <i class='bx bx-user-voice rms-input-icon'></i>
                                    <input id="contato" type="text" class="rms-input" placeholder="Nome do contato responsável (opcional)" name="contato" value="<?= set_value('contato') ?>" />
                                </div>
                            </div>

                        </div>

                        <!-- BLOCO 2: ENDEREÇO -->
                        <div class="rms-form-section-header">
                            <i class='bx bx-map-pin'></i> <span>Endereço Completo</span>
                        </div>

                        <div class="rms-form-grid-2">
                            
                            <!-- CEP -->
                            <div class="control-group rms-form-group">
                                <label for="cep" class="rms-form-label">CEP <span class="rms-required">*</span></label>
                                <div class="rms-input-container controls">
                                    <i class='bx bx-map-pin rms-input-icon'></i>
                                    <input id="cep" type="text" class="rms-input" placeholder="00000-000" name="cep" value="<?= set_value('cep') ?>" required />
                                </div>
                            </div>

                            <!-- Rua -->
                            <div class="control-group rms-form-group">
                                <label for="rua" class="rms-form-label">Rua / Logradouro <span class="rms-required">*</span></label>
                                <div class="rms-input-container controls">
                                    <i class='bx bx-map rms-input-icon'></i>
                                    <input id="rua" type="text" class="rms-input" placeholder="Nome da rua/avenida" name="rua" value="<?= set_value('rua') ?>" required />
                                </div>
                            </div>

                            <!-- Número -->
                            <div class="control-group rms-form-group">
                                <label for="numero" class="rms-form-label">Número <span class="rms-required">*</span></label>
                                <div class="rms-input-container controls">
                                    <i class='bx bx-hash rms-input-icon'></i>
                                    <input id="numero" type="text" class="rms-input" placeholder="Ex: 123" name="numero" value="<?= set_value('numero') ?>" required />
                                </div>
                            </div>

                            <!-- Complemento -->
                            <div class="control-group rms-form-group">
                                <label for="complemento" class="rms-form-label">Complemento</label>
                                <div class="rms-input-container controls">
                                    <i class='bx bx-building-house rms-input-icon'></i>
                                    <input id="complemento" type="text" class="rms-input" placeholder="Apto, Bloco, Sala..." name="complemento" value="<?= set_value('complemento') ?>" />
                                </div>
                            </div>

                            <!-- Bairro -->
                            <div class="control-group rms-form-group">
                                <label for="bairro" class="rms-form-label">Bairro <span class="rms-required">*</span></label>
                                <div class="rms-input-container controls">
                                    <i class='bx bx-street-view rms-input-icon'></i>
                                    <input id="bairro" type="text" class="rms-input" placeholder="Seu bairro" name="bairro" value="<?= set_value('bairro') ?>" required />
                                </div>
                            </div>

                            <!-- Cidade -->
                            <div class="control-group rms-form-group">
                                <label for="cidade" class="rms-form-label">Cidade <span class="rms-required">*</span></label>
                                <div class="rms-input-container controls">
                                    <i class='bx bx-city rms-input-icon'></i>
                                    <input id="cidade" type="text" class="rms-input" placeholder="Sua cidade" name="cidade" value="<?= set_value('cidade') ?>" required />
                                </div>
                            </div>

                            <!-- Estado -->
                            <div class="control-group rms-form-group rms-form-grid-full">
                                <label for="estado" class="rms-form-label">Estado <span class="rms-required">*</span></label>
                                <div class="rms-input-container controls">
                                    <i class='bx bx-map-alt rms-input-icon'></i>
                                    <select id="estado" name="estado" class="rms-input" required>
                                        <option value="">Selecione Seu Estado...</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <!-- BLOCO 3: SEGURANÇA CAPTCHA -->
                        <div class="rms-form-section-header">
                            <i class='bx bx-shield-check'></i> <span>Validação de Segurança</span>
                        </div>

                        <div class="rms-captcha-box">
                            <div class="rms-captcha-wrapper">
                                <div class="rms-captcha-img-card">
                                    <img id="imgCaptcha" src="<?= base_url() ?>index.php/mine/captcha" alt="Código de segurança Captcha">
                                </div>
                                <button type="button" id="btnReloadCaptcha" class="rms-captcha-reload-btn" title="Atualizar Imagem de Segurança">
                                    <i class='bx bx-refresh' style="font-size: 1.25rem;"></i> Atualizar Imagem
                                </button>
                            </div>

                            <div class="control-group rms-form-group" style="margin-bottom: 0;">
                                <label for="captcha" class="rms-form-label">Digite o texto da imagem acima <span class="rms-required">*</span></label>
                                <div class="rms-input-container controls">
                                    <i class='bx bx-shield-quarter rms-input-icon'></i>
                                    <input id="captcha" type="text" class="rms-input" placeholder="Digite o código da imagem" name="captcha" value="" autocomplete="off" required />
                                </div>
                            </div>
                        </div>

                        <!-- BOTÃO FINAL DE SUBMIT E LINK DE VOLTAR -->
                        <div class="rms-login-actions" style="margin-top: 2rem;">
                            <button type="submit" class="rms-btn rms-btn-primary rms-btn-full" style="height: 52px; font-size: 1.05rem;" id="btnSubmitCadastrar">
                                <i class='bx bx-user-plus' style="font-size: 1.3rem;"></i> CRIAR CONTA
                            </button>
                        </div>

                        <div class="rms-login-footer-links" style="justify-content: center; margin-top: 1.5rem; text-align: center;">
                            <span style="color: var(--rms-text-muted);">
                                Já possui uma conta na RM. Sollutions? 
                                <a href="<?= site_url('mine') ?>" style="font-weight: 600; text-decoration: underline; margin-left: 0.25rem;">
                                    <i class='bx bx-log-in-circle'></i> Acessar minha conta
                                </a>
                            </span>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </section>


    <!-- ==========================================
         3. FOOTER INSTITUCIONAL
         ========================================== -->
    <footer class="rms-footer">
        <div class="rms-container">
            <div class="rms-footer-grid">
                <div class="rms-footer-brand">
                    <img src="<?= base_url('assets/img/logo-rmsollutions.png'); ?>" alt="RM. Sollutions" style="height: 42px;">
                    <p>Assistência Técnica Especializada em Celulares, Computadores, Notebooks e Impressoras. Energia para Soluções em Tecnologia.</p>
                </div>

                <div class="rms-footer-links">
                    <h4>Links Rápidos</h4>
                    <ul>
                        <li><a href="<?= site_url('mine') ?>#inicio">Início</a></li>
                        <li><a href="<?= site_url('mine') ?>#servicos">Serviços</a></li>
                        <li><a href="<?= site_url('mine') ?>#equipamentos">Equipamentos</a></li>
                        <li><a href="<?= site_url('mine') ?>#sobre">História da Marca</a></li>
                        <li><a href="<?= site_url('mine') ?>#login-section">Área do Cliente</a></li>
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
         4. JS & LÓGICA PRESERVADA
         ========================================== -->
    <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.mask.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/funcoes.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.validate.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        <?php if ($this->session->flashdata('error') != null) { ?>
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: '<?= addslashes($this->session->flashdata('error')) ?>',
                showConfirmButton: false,
                timer: 4000
            });
        <?php } ?>

        <?php if ($this->session->flashdata('success') != null) { ?>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: '<?= addslashes($this->session->flashdata('success')) ?>',
                showConfirmButton: false,
                timer: 4000
            });
        <?php } ?>

        $(document).ready(function() {

            // Mobile Menu Toggle
            $('#rmsMobileToggle').on('click', function() {
                $('#rmsMobileMenu').toggleClass('active');
            });

            $('.rms-mobile-link').on('click', function() {
                $('#rmsMobileMenu').removeClass('active');
            });

            // Captcha Reload Button
            $('#btnReloadCaptcha').on('click', function() {
                $('#imgCaptcha').attr('src', '<?= base_url() ?>index.php/mine/captcha?' + new Date().getTime());
            });

            // Popula Select de Estados via JSON
            $.getJSON('<?= base_url() ?>assets/json/estados.json', function(data) {
                for (i in data.estados) {
                    $('#estado').append(new Option(data.estados[i].nome, data.estados[i].sigla));
                    var curState = '<?= set_value('estado'); ?>';
                    if (curState) {
                        $("#estado option[value=" + curState + "]").prop("selected", true);
                    }
                }
            });

            // Toggle Senha preservando compatibilidade com #imgSenha e #senha
            let inputSenha = document.querySelector('#senha');
            let iconSenha = document.querySelector('#imgSenha');
            let btnToggleSenha = document.querySelector('#togglePasswordBtn');

            if (btnToggleSenha && inputSenha) {
                btnToggleSenha.addEventListener('click', function() {
                    if (inputSenha.type === 'password') {
                        inputSenha.type = 'text';
                        if (iconSenha) iconSenha.src = '<?= base_url() ?>assets/img/eye-off.svg';
                    } else {
                        inputSenha.type = 'password';
                        if (iconSenha) iconSenha.src = '<?= base_url() ?>assets/img/eye.svg';
                    }
                });
            }

            // Validação jQuery Validate (Mantida 100% Intacta)
            $('#formCliente').validate({
                rules: {
                    nomeCliente: {
                        required: true
                    },
                    documento: {
                        required: true
                    },
                    telefone: {
                        required: true
                    },
                    email: {
                        required: true
                    },
                    senha: {
                        required: true
                    },
                    rua: {
                        required: true
                    },
                    numero: {
                        required: true
                    },
                    bairro: {
                        required: true
                    },
                    cidade: {
                        required: true
                    },
                    estado: {
                        required: true
                    },
                    cep: {
                        required: true
                    },
                    captcha: {
                        required: true
                    }
                },
                messages: {
                    nomeCliente: {
                        required: 'Por favor, informe seu nome.'
                    },
                    documento: {
                        required: 'Por favor, informe seu CPF ou CNPJ.'
                    },
                    telefone: {
                        required: 'Por favor, informe seu telefone.'
                    },
                    email: {
                        required: 'Por favor, informe um e-mail válido.'
                    },
                    senha: {
                        required: 'Por favor, crie uma senha de acesso.'
                    },
                    rua: {
                        required: 'Por favor, informe sua rua/logradouro.'
                    },
                    numero: {
                        required: 'Por favor, informe o número.'
                    },
                    bairro: {
                        required: 'Por favor, informe seu bairro.'
                    },
                    cidade: {
                        required: 'Por favor, informe sua cidade.'
                    },
                    estado: {
                        required: 'Por favor, selecione seu estado.'
                    },
                    cep: {
                        required: 'Por favor, informe seu CEP.'
                    },
                    captcha: {
                        required: 'Por favor, digite o código da imagem.'
                    }
                },
                errorClass: "help-inline",
                errorElement: "span",
                highlight: function(element, errorClass, validClass) {
                    $(element).parents('.control-group').addClass('error');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).parents('.control-group').removeClass('error');
                    $(element).parents('.control-group').addClass('success');
                }
            });
        });
    </script>
</body>

</html>
