-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05/06/2023 às 17:53
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbacademico`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `matricula` varchar(9) NOT NULL,
  `senha` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `administrador`
--

INSERT INTO `administrador` (`id`, `nome`, `matricula`, `senha`) VALUES
(1, 'Beatriz', '2024009', 'Jorge@love'),
(2, 'Alice', '2023008', 'Teste@123');

-- --------------------------------------------------------

--
-- Estrutura para tabela `aluno`
--

CREATE TABLE `aluno` (
  `idAluno` int(11) NOT NULL,
  `nomeAluno` varchar(60) NOT NULL,
  `curso` varchar(60) NOT NULL,
  `tipoCurso` varchar(60) NOT NULL,
  `matriculaAluno` varchar(9) NOT NULL,
  `senhaAluno` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `curso`
--

CREATE TABLE `curso` (
  `idCurso` int(11) NOT NULL,
  `nomeCurso` varchar(60) NOT NULL,
  `cargaHorariaCurso` float NOT NULL,
  `tipoCurso` varchar(60) DEFAULT NULL,
  `turno` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `curso`
--

INSERT INTO `curso` (`idCurso`, `nomeCurso`, `cargaHorariaCurso`, `tipoCurso`, `turno`) VALUES
(1, 'Meio Ambiente', 2000, 'Médio Integrado', 'vespertino'),
(2, 'Agropecuaria', 2000, 'Médio Integrado', 'vespertino'),
(3, 'Edificacoes', 2000, 'Médio Integrado', 'vespertino'),
(4, 'Redes de Computadores', 2000, 'Médio Integrado', 'vespertino'),
(5, 'Informatica', 2000, 'Médio Integrado', 'vespertino'),
(6, 'Administracao', 2000, 'Médio Integrado', 'vespertino'),
(7, 'Florestas', 2000, 'Médio Integrado', 'vespertino'),
(8, 'Financas', 2000, 'Médio Integrado', 'vespertino'),
(9, 'Agricultura', 2000, 'Médio Integrado', 'vespertino'),
(10, 'Alimentos', 2000, 'Médio Integrado', 'vespertino'),
(11, 'Biotecnologia', 2000, 'Médio Integrado', 'vespertino'),
(12, 'Recursos Pesqueiros', 2000, 'Médio Integrado', 'vespertino'),
(13, 'Agroecologia', 2000, 'Técnico Subsequente', 'vespertino'),
(14, 'Agronegocio', 2000, 'Técnico Subsequente', 'vespertino'),
(15, 'Agroindustria', 2000, 'Técnico Subsequente', 'vespertino'),
(16, 'Gestao Ambiental', 2000, 'Técnico Subsequente', 'vespertino'),
(17, 'Logistica', 2000, 'Técnico Subsequente', 'vespertino'),
(18, 'Processos Escolares', 2000, 'Técnico Subsequente', 'vespertino'),
(19, 'Agronegocio', 3000, 'Superior de Tecnologia', 'matutino'),
(20, 'Agroindustria', 3000, 'Superior de Tecnologia', 'matutino'),
(21, 'Gestao Ambiental', 3000, 'Superior de Tecnologia', 'noturno'),
(22, 'Logistica', 3000, 'Superior de Tecnologia', 'noturno'),
(23, 'Sistemas para internet', 3000, 'Superior de Tecnologia', 'vespertino'),
(24, 'Processos Escolares', 3000, 'Superior de Tecnologia', 'noturno'),
(25, 'Administracao', 4000, 'Bacharelado', 'vespertino'),
(26, 'Zootecnia', 4000, 'Bacharelado', 'matutino'),
(27, 'Ciencias Biologicas', 4000, 'Licenciatura', 'vespertino'),
(28, 'Fisica', 4000, 'Licenciatura', 'matutino'),
(29, 'Matematica', 4000, 'Licenciatura', 'matutino'),
(30, 'Quimica', 4000, 'Licenciatura', 'matutino'),
(31, 'Logistica Empresarial', 4000, 'Especialização', 'noturno'),
(32, 'Educacao Profissional - EPT', 4000, 'Especialização', 'noturno'),
(33, 'Projeto Agricultor Familiar', 4000, 'Especialização', 'vespertino'),
(34, 'Mestrado em EPT', 2000, 'Mestrado', 'matutino');

-- --------------------------------------------------------

--
-- Estrutura para tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `idDisciplina` int(11) NOT NULL,
  `nomeDisciplina` varchar(60) NOT NULL,
  `cargaHorariaDisciplina` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `disciplina`
--

INSERT INTO `disciplina` (`idDisciplina`, `nomeDisciplina`, `cargaHorariaDisciplina`) VALUES
(1, 'Introdução à Biologia Celular', 60),
(2, 'Fundamentos da Química para Biólogos', 80),
(3, 'Fundamentos da Ecologia', 70),
(4, 'Introdução à Microbiologia', 60),
(5, 'Biologia dos Organismos', 90),
(6, 'Gestao de Projetos', 90),
(7, 'Marketing Digital', 60),
(8, 'Legislação da Educacao', 60),
(9, 'Economia Empresarial', 45),
(10, 'Logística e Cadeia de Suprimentos', 60),
(11, 'Fisica Moderna', 90),
(12, 'Introducao ao Ensino de Física', 90);

-- --------------------------------------------------------

--
-- Estrutura para tabela `professor`
--

CREATE TABLE `professor` (
  `idProfessor` int(11) NOT NULL,
  `nomeProfessor` varchar(60) NOT NULL,
  `escolaridade` varchar(60) NOT NULL,
  `especializacao` varchar(60) NOT NULL,
  `matriculaProfessor` varchar(9) NOT NULL,
  `senhaProfessor` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
git 
--
-- Estrutura para tabela `turma`
--

CREATE TABLE `turma` (
  `idTurma` int(11) NOT NULL,
  `periodo` varchar(20) NOT NULL,
  `turno` varchar(20) NOT NULL,
  `curso_id` int(11) NOT NULL,
  `disciplina_id` int(11) NOT NULL,
  `estudante_nome` varchar(100) NOT NULL,
  `estudante_matricula` int(11) NOT NULL,
  `professor_nome` varchar(100) NOT NULL,
  `professor_matricula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `matricula` (`matricula`);

--
-- Índices de tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`idAluno`),
  ADD UNIQUE KEY `matriculaAluno` (`matriculaAluno`);

--
-- Índices de tabela `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`idCurso`);

--
-- Índices de tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`idDisciplina`);

--
-- Índices de tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`idProfessor`),
  ADD UNIQUE KEY `matriculaProfessor` (`matriculaProfessor`);

--
-- Índices de tabela `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`idTurma`),
  ADD KEY `curso_id` (`curso_id`),
  ADD KEY `disciplina_id` (`disciplina_id`),
  ADD KEY `estudante_matricula` (`estudante_matricula`),
  ADD KEY `professor_matricula` (`professor_matricula`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `idAluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `curso`
--
ALTER TABLE `curso`
  MODIFY `idCurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de tabela `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `idDisciplina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `professor`
--
ALTER TABLE `professor`
  MODIFY `idProfessor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `turma_ibfk_1` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`idCurso`),
  ADD CONSTRAINT `turma_ibfk_2` FOREIGN KEY (`disciplina_id`) REFERENCES `disciplina` (`idDisciplina`),
  ADD CONSTRAINT `turma_ibfk_3` FOREIGN KEY (`estudante_matricula`) REFERENCES `aluno` (`idAluno`),
  ADD CONSTRAINT `turma_ibfk_4` FOREIGN KEY (`professor_matricula`) REFERENCES `professor` (`idProfessor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
