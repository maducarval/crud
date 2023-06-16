SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `efetivo` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `nome_guerra` varchar(100) NOT NULL,
  `saram` varchar(7) DEFAULT NULL,
  `cpf` varchar(100) NOT NULL,
  `om` varchar(100) NOT NULL,
  `data_nascimento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `efetivo` (`id`, `nome`, `nome_guerra`, `saram`, `cpf`, `om`, `data_nascimento`, `setor_id`) VALUES
(1, 'MARIA EDUARDA CARVALHO ', 'MARIA EDUARDA CARVALHO', '7500009', '05546714174', 'CCA-BR', '2003-01-10', 2),
(2, 'HENRIQUE SILVA MOURA ', 'HENRIQUE ', ' 695313', '123456789', 'CCA-BR', '2021-08-31', 1),
(3, 'RÔMULO DE SOUSA RIBEIRO ', 'RÔMULO', ' 743530', '9876543210', 'CCA-BR', '2022-08-31', 2),
(5, 'WELTON MOREIRA DOS SANTOS ', ' WELTON ', ' 397589', '23418635487', 'DTI', '2019-08-01', 3);

INSERT INTO `setor` (`nome_setor`, `sigla_setor`) VALUES
('Divisão Técnica', 'DT'),
('Seção de Análise e Implementação','SAI'), 
('Seção de Administração de Dados','SAD'),
('Seção de Suporte Interno','SSI'),
('Subdivisão de Desenvolvimento e Manutenção de Sistemas Aplicativos','SDDM');

INSERT INTO cursos(nome_curso, sigla_curso) VALUES 
("Curso de Catalogação Aplicada à Logística", "CCAT"),
("Curso de Inspetor de Material Bélico", "CIMBE"),
("Curso Geral de Unidades de Força Terrestre", "COEM"),
("Curso de Bombeiro de Aeródromo Militar", "CBA-M"),
("Estágio de Manutenção de Baterias Alcalinas","EMBA");

INSERT INTO `efetivo_cursos` (`efetivo_id`, `curso_id`) VALUES ('1', '2');


ALTER TABLE `efetivo`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `efetivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;