-- Script de Migração: Índices Otimizados para Relatórios ERP Map-OS
-- Versão: 4.53.3

-- Índice 1: Otimização de busca de OS por data e status
ALTER TABLE `os` ADD INDEX `idx_os_data_status` (`dataInicial`, `status`);

-- Índice 2: Otimização de busca de Vendas por data e faturamento
ALTER TABLE `vendas` ADD INDEX `idx_vendas_data_faturado` (`dataVenda`, `faturado`);

-- Índice 3: Otimização de relatórios Financeiros por vencimento, pagamento e tipo
ALTER TABLE `lancamentos` ADD INDEX `idx_lancamentos_relatorio` (`data_vencimento`, `baixado`, `tipo`);
