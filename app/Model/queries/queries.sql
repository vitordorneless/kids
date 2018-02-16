CREATE SCHEMA `kids` ;

CREATE TABLE `kids`.`usuarios` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(145) NOT NULL,
  `pass` VARCHAR(145) NOT NULL,
  `id_setor` INT NOT NULL,
  `nome` VARCHAR(145) NOT NULL,
  `foto` VARCHAR(145) NOT NULL,
  `email` VARCHAR(245) NOT NULL,
  `admin` INT NOT NULL,
  `status` INT NOT NULL,
  `user_created` INT NOT NULL,
  `date_created` DATETIME NOT NULL,
  `user_edit` INT NOT NULL,
  `date_edit` DATETIME NOT NULL,
  `data_ultima_alteracao` DATETIME NOT NULL,
  PRIMARY KEY (`id`));
  
  CREATE TABLE `kids`.`usuarios_setores` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `setor` VARCHAR(97) NOT NULL,
  `user_created` INT NOT NULL,
  `date_created` DATETIME NOT NULL,
  `user_edit` INT NOT NULL,
  `date_edit` DATETIME NOT NULL,
  `status` INT NOT NULL,
  `data_ultima_alteracao` DATETIME NOT NULL,
  PRIMARY KEY (`id`));
  
  CREATE TABLE `kids`.`usuarios_permissoes` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_usuario` INT NOT NULL,
  `super_admin` INT NOT NULL,
  `admin` INT NOT NULL,
  `aulas` INT NOT NULL,
  `user_created` INT NOT NULL,
  `date_created` DATETIME NOT NULL,
  `user_edit` INT NOT NULL,
  `date_edit` DATETIME NOT NULL,
  `status` INT NOT NULL,
  `data_ultima_alteracao` DATETIME NOT NULL,
  PRIMARY KEY (`id`));
  
  CREATE TABLE `kids`.`cargos` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `cargo` VARCHAR(83) NOT NULL,
  `user_created` INT NOT NULL,
  `date_created` DATETIME NOT NULL,
  `user_edit` INT NOT NULL,
  `date_edit` DATETIME NOT NULL,
  `status` INT NOT NULL,
  `data_ultima_alteracao` DATETIME NOT NULL,
  PRIMARY KEY (`id`));
  
  CREATE TABLE `kids`.`funcionarios` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_usuario` INT NOT NULL,
  `id_cargo` INT NOT NULL,
  `user_created` INT NOT NULL,
  `date_created` DATETIME NOT NULL,
  `user_edit` INT NOT NULL,
  `date_edit` DATETIME NOT NULL,
  `status` INT NOT NULL,
  `data_ultima_alteracao` DATETIME NOT NULL,
  PRIMARY KEY (`id`));
  
  CREATE TABLE `kids`.`alunos` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(245) NOT NULL,
  `cpf` VARCHAR(13) NOT NULL,
  `nome_mae` VARCHAR(245) NOT NULL,
  `cpf_mae` VARCHAR(13) NOT NULL,
  `tel_mae` VARCHAR(45) NOT NULL,
  `email_mae` VARCHAR(245) NOT NULL,
  `nome_pai` VARCHAR(245) NOT NULL,
  `cpf_pai` VARCHAR(13) NOT NULL,
  `tel_pai` VARCHAR(45) NOT NULL,
  `email_pai` VARCHAR(245) NOT NULL,
  `enviar_email` INT NOT NULL,
  `contato` VARCHAR(245) NOT NULL,
  `tel_contato` VARCHAR(45) NOT NULL,
  `obs` TEXT NOT NULL,
  `nascimento` DATETIME NOT NULL,
  `id_alergia` INT NOT NULL,
  `peso` VARCHAR(45) NOT NULL,
  `data_peso` DATETIME NOT NULL,
  `altura` VARCHAR(45) NOT NULL,
  `data_altura` DATETIME NOT NULL,
  `deficiente` INT NOT NULL,
  `data_criacao` DATETIME NOT NULL,
  `user_created` INT NOT NULL,
  `date_created` DATETIME NOT NULL,
  `user_edit` INT NOT NULL,
  `date_edit` DATETIME NOT NULL,
  `status` INT NOT NULL,
  `data_ultima_alteracao` DATETIME NOT NULL,
  PRIMARY KEY (`id`));
  
  CREATE TABLE `kids`.`valores` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `faixa_etaria` VARCHAR(45) NOT NULL,
  `valor` VARCHAR(45) NOT NULL,
  `user_created` INT NOT NULL,
  `date_created` DATETIME NOT NULL,
  `user_edit` INT NOT NULL,
  `date_edit` DATETIME NOT NULL,
  `status` INT NOT NULL,
  `data_ultima_alteracao` DATETIME NOT NULL,
  PRIMARY KEY (`id`));
  
  CREATE TABLE `kids`.`valores_historico` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `faixa_etaria` VARCHAR(45) NOT NULL,
  `valor` VARCHAR(45) NOT NULL,
  `data_antes_reajuste` DATETIME NOT NULL,
  `user_created` INT NOT NULL,
  `date_created` DATETIME NOT NULL,
  `user_edit` INT NOT NULL,
  `date_edit` DATETIME NOT NULL,
  `status` INT NOT NULL,
  `data_ultima_alteracao` DATETIME NOT NULL,
  PRIMARY KEY (`id`));
  
  CREATE TABLE `kids`.`reajuste` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `reajuste` VARCHAR(45) NOT NULL,
  `user_created` INT NOT NULL,
  `date_created` DATETIME NOT NULL,
  `user_edit` INT NOT NULL,
  `date_edit` DATETIME NOT NULL,
  `status` INT NOT NULL,
  `data_ultima_alteracao` DATETIME NOT NULL,
  PRIMARY KEY (`id`));
  
  CREATE TABLE `kids`.`semestre` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `semestre` INT NOT NULL,
  `user_created` INT NOT NULL,
  `date_created` DATETIME NOT NULL,
  `user_edit` INT NOT NULL,
  `date_edit` DATETIME NOT NULL,
  `status` INT NOT NULL,
  `data_ultima_alteracao` DATETIME NOT NULL,
  PRIMARY KEY (`id`));
  
  CREATE TABLE `kids`.`sede` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(245) NOT NULL,
  `cnpj` VARCHAR(45) NOT NULL,
  `endereco` VARCHAR(245) NOT NULL,
  `numero` VARCHAR(45) NOT NULL,
  `complemento` VARCHAR(45) NOT NULL,
  `cep` VARCHAR(9) NOT NULL,
  `bairro` INT NOT NULL,
  `cidade` INT NOT NULL,
  `tel1` VARCHAR(45) NOT NULL,
  `tel2` VARCHAR(45) NOT NULL,
  `email1` VARCHAR(245) NOT NULL,
  `email2` VARCHAR(245) NOT NULL,
  `site` VARCHAR(245) NOT NULL,
  `principal` INT NOT NULL,
  `user_created` INT NOT NULL,
  `date_created` DATETIME NOT NULL,
  `user_edit` INT NOT NULL,
  `date_edit` DATETIME NOT NULL,
  `status` INT NOT NULL,
  `data_ultima_alteracao` DATETIME NOT NULL,
  PRIMARY KEY (`id`));
  
  CREATE TABLE `kids`.`salas` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_sede` INT NOT NULL,
  `numero_sala` INT NOT NULL,
  `nome_sala` VARCHAR(45) NOT NULL,
  `max_alunos` INT NOT NULL,
  `id_prof_titular` INT NOT NULL,
  `id_prof_reserva` INT NOT NULL,
  `id_diretora` INT NOT NULL,
  `user_created` INT NOT NULL,
  `date_created` DATETIME NOT NULL,
  `user_edit` INT NOT NULL,
  `date_edit` DATETIME NOT NULL,
  `status` INT NOT NULL,
  `data_ultima_alteracao` DATETIME NOT NULL,
  PRIMARY KEY (`id`));
  
  CREATE TABLE `kids`.`salas_alunos` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_salas` INT NOT NULL,
  `id_alunos` INT NOT NULL,
  `id_semestre` INT NOT NULL,
  `user_created` INT NOT NULL,
  `date_created` DATETIME NOT NULL,
  `user_edit` INT NOT NULL,
  `date_edit` DATETIME NOT NULL,
  `status` INT NOT NULL,
  `data_ultima_alteracao` DATETIME NOT NULL,
  PRIMARY KEY (`id`));
  
  CREATE TABLE `kids`.`chamada` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_salas` INT NOT NULL,
  `id_alunos` INT NOT NULL,
  `data_chamada` DATETIME NOT NULL,
  `dia_semana` VARCHAR(45) NOT NULL,
  `cafe_manha` INT NOT NULL,
  `lanche_manha` INT NOT NULL,
  `almoco` INT NOT NULL,
  `lanche_tarde` INT NOT NULL,
  `jantar` INT NOT NULL,
  `presente` INT NOT NULL,
  `user_created` INT NOT NULL,
  `date_created` DATETIME NOT NULL,
  `user_edit` INT NOT NULL,
  `date_edit` DATETIME NOT NULL,
  `status` INT NOT NULL,
  `data_ultima_alteracao` DATETIME NOT NULL,
  PRIMARY KEY (`id`));
  
  CREATE TABLE `kids`.`atividades` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `atividade` VARCHAR(245) NOT NULL,
  `id_tipo_atividade` INT NOT NULL,
  `user_created` INT NOT NULL,
  `date_created` DATETIME NOT NULL,
  `user_edit` INT NOT NULL,
  `date_edit` DATETIME NOT NULL,
  `status` INT NOT NULL,
  `data_ultima_alteracao` DATETIME NOT NULL,
  PRIMARY KEY (`id`));
  
  CREATE TABLE `kids`.`tipo_atividade` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(245) NOT NULL,
  `user_created` INT NOT NULL,
  `date_created` DATETIME NOT NULL,
  `user_edit` INT NOT NULL,
  `date_edit` DATETIME NOT NULL,
  `status` INT NOT NULL,
  `data_ultima_alteracao` DATETIME NOT NULL,
  PRIMARY KEY (`id`));
  
  CREATE TABLE `kids`.`salas_atividades` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_salas` INT NOT NULL,
  `id_atividades` INT NOT NULL,
  `horario` VARCHAR(45) NOT NULL,
  `data` DATETIME NOT NULL,
  `user_created` INT NOT NULL,
  `date_created` DATETIME NOT NULL,
  `user_edit` INT NOT NULL,
  `date_edit` DATETIME NOT NULL,
  `atividade_realizada` INT NOT NULL,
  `status` INT NOT NULL,
  `data_ultima_alteracao` DATETIME NOT NULL,
  PRIMARY KEY (`id`));
  
  CREATE TABLE `kids`.`comunicados` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_sala` INT NOT NULL,
  `comunicado` TEXT NOT NULL,
  `autorizacao_pais` INT NOT NULL,
  `user_created` INT NOT NULL,
  `date_created` DATETIME NOT NULL,
  `user_edit` INT NOT NULL,
  `date_edit` DATETIME NOT NULL,
  `status` INT NOT NULL,
  `data_ultima_alteracao` DATETIME NOT NULL,
  PRIMARY KEY (`id`));
  
  CREATE TABLE `kids`.`comunicados_autorizacao` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_sala` INT NOT NULL,
  `id_alunos` INT NOT NULL,
  `comunicado` TEXT NOT NULL,
  `cpf_pais` VARCHAR(11) NOT NULL,
  `autorizacao_pais` INT NOT NULL,
  `user_created` INT NOT NULL,
  `date_created` DATETIME NOT NULL,
  `user_edit` INT NOT NULL,
  `date_edit` DATETIME NOT NULL,
  `status` INT NOT NULL,
  `data_ultima_alteracao` DATETIME NOT NULL,
  PRIMARY KEY (`id`));
  
  CREATE TABLE `kids`.`lanches` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `lanche` VARCHAR(145) NOT NULL,
  `user_created` INT NOT NULL,
  `date_created` DATETIME NOT NULL,
  `user_edit` INT NOT NULL,
  `date_edit` DATETIME NOT NULL,
  `status` INT NOT NULL,
  `data_ultima_alteracao` DATETIME NOT NULL,
  PRIMARY KEY (`id`));
  
  CREATE TABLE `kids`.`cardapio` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `cafe_manha` INT NOT NULL,
  `lanche_manha` INT NOT NULL,
  `almoco` INT NOT NULL,
  `lanche_tarde` INT NOT NULL,
  `cafe_tarde` INT NOT NULL,
  `jantar` INT NOT NULL,
  `lanche_noturno` INT NOT NULL,
  `dia_cardapio` DATETIME NOT NULL,
  `faixa_etaria` INT NOT NULL,
  `id_nutricionista` INT NOT NULL,
  `user_created` INT NOT NULL,
  `date_created` DATETIME NOT NULL,
  `user_edit` INT NOT NULL,
  `date_edit` DATETIME NOT NULL,
  `status` INT NOT NULL,
  `data_ultima_alteracao` DATETIME NOT NULL,
  PRIMARY KEY (`id`));
  
  CREATE TABLE `kids`.`nutricionista` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(145) NOT NULL,
  `conselho` VARCHAR(145) NOT NULL,
  `telefone` VARCHAR(45) NOT NULL,
  `email` VARCHAR(145) NOT NULL,
  `user_created` INT NOT NULL,
  `date_created` DATETIME NOT NULL,
  `user_edit` INT NOT NULL,
  `date_edit` DATETIME NOT NULL,
  `status` INT NOT NULL,
  `data_ultima_alteracao` DATETIME NOT NULL,
  PRIMARY KEY (`id`));
  
  CREATE TABLE `kids`.`enfermaria` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_alunos` INT NOT NULL,
  `prescricao` TEXT NOT NULL,
  `continuo` INT NOT NULL,
  `validade_receita` INT NOT NULL,
  `periodo1` DATETIME NOT NULL,
  `periodo2` DATETIME NOT NULL,
  `intervalo_medicamento` VARCHAR(45) NOT NULL,
  `local_receita` VARCHAR(245) NOT NULL,
  `obs` TEXT NOT NULL,
  `user_created` INT NOT NULL,
  `date_create` DATETIME NOT NULL,
  `user_edit` INT NOT NULL,
  `date_edit` DATETIME NOT NULL,
  `status` INT NOT NULL,
  `data_ultima_alteracao` DATETIME NOT NULL,
  PRIMARY KEY (`id`));
  
  CREATE TABLE `kids`.`incidentes` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_salas` INT NOT NULL,
  `id_alunos` INT NOT NULL,
  `ocorrido` TEXT NOT NULL,    
  `quando` DATETIME NOT NULL,
  `hora` DATETIME NOT NULL,
  `chamar_pais` INT NOT NULL,  
  `obs` TEXT NOT NULL,
  `user_created` INT NOT NULL,
  `date_create` DATETIME NOT NULL,
  `user_edit` INT NOT NULL,
  `date_edit` DATETIME NOT NULL,
  `status` INT NOT NULL,
  `data_ultima_alteracao` DATETIME NOT NULL,
  PRIMARY KEY (`id`));
  
  CREATE TABLE `kids`.`itens` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `codigo` VARCHAR(145) NOT NULL,
  `item` VARCHAR(145) NOT NULL,
  `id_unidade` INT NOT NULL,
  `user_created` INT NOT NULL,
  `date_created` DATETIME NOT NULL,
  `user_edit` INT NOT NULL,
  `date_edit` DATETIME NOT NULL,
  `status` INT NOT NULL,
  `data_ultima_alteracao` DATETIME NOT NULL,
  PRIMARY KEY (`id`));
  
  CREATE TABLE `kids`.`unidade` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `unidade` VARCHAR(145) NOT NULL,
  `desc_unidade` VARCHAR(145) NOT NULL,  
  `user_created` INT NOT NULL,
  `date_created` DATETIME NOT NULL,
  `user_edit` INT NOT NULL,
  `date_edit` DATETIME NOT NULL,
  `status` INT NOT NULL,
  `data_ultima_alteracao` DATETIME NOT NULL,
  PRIMARY KEY (`id`));
  
  CREATE TABLE `kids`.`estoque_itens` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_itens` INT NOT NULL,
  `quantidade` VARCHAR(12) NOT NULL,
  `user_created` INT NOT NULL,
  `date_created` DATETIME NOT NULL,
  `user_edit` INT NOT NULL,
  `date_edit` DATETIME NOT NULL,
  `status` INT NOT NULL,
  `data_ultima_alteracao` DATETIME NOT NULL,
  PRIMARY KEY (`id`));
  
  CREATE TABLE `kids`.`alergia` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(145) NOT NULL,
  `user_created` INT NOT NULL,
  `date_created` DATETIME NOT NULL,
  `user_edit` INT NOT NULL,
  `date_edit` DATETIME NOT NULL,
  `status` INT NOT NULL,
  `data_ultima_alteracao` DATETIME NOT NULL,
  PRIMARY KEY (`id`));
  
  CREATE TABLE `kids`.`alunos_valores` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_alunos` INT NOT NULL,
  `id_valores` INT NOT NULL,
  `desconto` VARCHAR(45) NOT NULL,
  `acrescimo` VARCHAR(45) NOT NULL,
  `multa` VARCHAR(45) NOT NULL,
  `valor_total` VARCHAR(45) NOT NULL,
  `competencia` VARCHAR(2) NOT NULL,
  `ano` VARCHAR(4) NOT NULL,
  `comp_ano` VARCHAR(6) NOT NULL,
  `pago` INT NOT NULL,
  `recibo` VARCHAR(145) NOT NULL,
  `dia_vencimento` VARCHAR(3) NOT NULL,
  `user_created` INT NOT NULL,
  `date_created` DATETIME NOT NULL,
  `user_edit` INT NOT NULL,
  `date_edit` DATETIME NOT NULL,
  `status` INT NOT NULL,
  `data_ultima_alteracao` DATETIME NOT NULL,
  PRIMARY KEY (`id`));
  
  CREATE TABLE `kids`.`comeu` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(45) NOT NULL,
  `user_created` INT NOT NULL,
  `date_created` DATETIME NOT NULL,
  `user_edit` INT NOT NULL,
  `date_edit` DATETIME NOT NULL,
  `status` INT NOT NULL,
  `data_ultima_alteracao` DATETIME NOT NULL,
  PRIMARY KEY (`id`));
  
  CREATE TABLE `kids`.`log` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(145) NOT NULL,
  `id_operacao` INT NOT NULL,
  `user` INT NOT NULL,
  `hora` TIME NOT NULL,
  `dia` DATETIME NOT NULL,
  `status` INT NOT NULL,
  `data_ultima_alteracao` DATETIME NOT NULL,
  PRIMARY KEY (`id`));