SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema alunos_4dmd
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema alunos_4dmd
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `alunos_4dmd` DEFAULT CHARACTER SET utf8 ;
USE `alunos_4dmd` ;

-- -----------------------------------------------------
-- Table `alunos_4dmd`.`alunos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alunos_4dmd`.`alunos` ;

CREATE TABLE IF NOT EXISTS `alunos_4dmd`.`alunos` (
  `ra` CHAR(14) NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `endereco` VARCHAR(45) NOT NULL,
  `complemento` CHAR(10) NOT NULL,
  `numero` CHAR(10) NOT NULL,
  `bairro` CHAR(20) NOT NULL,
  `cidade` CHAR(20) NOT NULL,
  `estado` CHAR(20) NOT NULL,
  `telefone` CHAR(15) NOT NULL,
  PRIMARY KEY (`ra`))
ENGINE = InnoDB;

INSERT INTO `alunos` (`ra`, `nome`, `endereco`, `complemento`, `numero`, `bairro`, `cidade`, `estado`, `telefone`) VALUES
('2091301913001', 'João Silva', 'Rua Alvira', 'bloco 2', '20', 'Vila Almir', 'Barueri', 'São Paulo', '11978475028'),
('2091301923002', 'Samanta Souza', 'Avenida Juandir', 'casa 2', '402', 'Jardim Nuanci', 'Barueri', 'São Paulo', '11972279527'),
('2091301923003', 'Nicole Cequeira', 'Rua Mariana', 'piso 2', '57', 'Centro', 'Barueri', 'São Paulo', '11945162934'),
('2091301923004', 'Henrique Lopes', 'Rua Diadema', 'casa 4', '76', 'Parque Santana', 'Jandira', 'São Paulo', '1194542964'),
('2091301923005', 'Arnaldo Solivan', 'Rua Soleda', 'casa 1', '14', 'Centro', 'Jandira', 'São Paulo', '11902451936'),
('2091301913002', 'Antonio Araujo', 'Avenida Legitima', 'apto 2', '600', 'Vila Monadi', 'Jandira', 'São Paulo', '11944772527'),
('2091301913003', 'Derick Pereira', 'Rua Henrique Galves', 'casa3', '16', 'Vila Nova', 'Osasco', 'São Paulo', '1194542459'),
('2091301913004', 'David Lima', 'Rua Camode', 'bloco A', '250', 'Jardim Auramor', 'Barueri', 'São Paulo', '1194536964'),
('2091301913005', 'Bianca Veronesi', 'Rua Velinda', 'piso 1', '96', 'Parque Luz', 'Osasco', 'São Paulo', '11947894700'),
('2091302013001', 'Lucas Tironi', 'Avenida Marcelo de Paes', 'apto 511', '423', 'Vila João', 'Cotia', 'São Paulo', '11929585964'),
('2091302013002', 'Jonatan Maciel', 'Rua Toca', 'térreo', '36', 'Parque Pedreira', 'Carapicuíba', 'São Paulo', '1194742564'),
('2091302013003', 'Angela Alves', 'Rua Maria Lisa', 'casa 4', '89', 'Vila Joaquim', 'Carapicuíba', 'São Paulo', '11913272650');


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
