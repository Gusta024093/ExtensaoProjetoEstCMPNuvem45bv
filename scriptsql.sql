drop database if exists `gbras`;
create database if not exists `gbras`;
use `gbras`;

Create table if not exists Cliente(
	nome varchar(55),
    cpf varchar(11),
    senha varchar(35),
    telefone int,
    email varchar(55),
    primary key(cpf, senha)
) DEFAULT CHARSET=UTF8MB4 COLLATE UTF8MB4_UNICODE_CI;

Create table if not exists Administrador(
	id int auto_increment,
	nome varchar(55),
    cpf varchar(11),
    senha varchar(35),
    primary key(id, cpf)
) DEFAULT CHARSET=UTF8MB4 COLLATE UTF8MB4_UNICODE_CI;

Create table if not exists Pedido(
	id int auto_increment,
    cpf_cliente varchar(11),
    titulo varchar(50),
    descricao varchar(255),
    estado varchar(25) default "Não Iniciado",
    primary key(id, cpf_cliente)
) DEFAULT CHARSET=UTF8MB4 COLLATE UTF8MB4_UNICODE_CI;

alter table Pedido add CONSTRAINT FK1 FOREIGN KEY (cpf_cliente) REFERENCES Cliente (cpf);

CREATE table if not exists Administrador_Pedido (
    id_pedido int,
    id_administrador varchar(11)
) DEFAULT CHARSET=UTF8MB4 COLLATE UTF8MB4_UNICODE_CI;

alter table Administrador_Pedido add CONSTRAINT FK2 FOREIGN KEY (id_pedido) REFERENCES Pedido (id);
alter table Administrador_Pedido add CONSTRAINT FK3 FOREIGN KEY (id_administrador) REFERENCES Administrador (id);

Insert into Cliente values ("Pedro da Silva", "11122233344", "25x012ik3", 5522839431233, "xyz@gmail.com");
Insert into Cliente values ("Maria Costa", "12345654678", "12345678", 5522839121253, "xyza@gmail.com");

Insert into Administrador values(null, "Dilson Romulo", "19234512323", "senha123");

Insert into Pedido values (null, "13256787612", "Maquina Quebrada", "PC não liga com cheiro de queimado", "Não Iniciado");
Insert into Pedido values (null, "12345654678", "Maquina Quebrada 2", "PC não liga com cheiro de queimado", "Não Iniciado");
Insert into Pedido values (null, "12345654678", "Maquina Quebrada 3", "PC não liga com cheiro de queimado", "Não Iniciado");




select Cliente.nome, Cliente.cpf, Pedido.titulo, Pedido.descricao, Administrador.nome as "Nome do Administrador" from Cliente, Pedido, Administrador_Pedido, Administrador where Cliente.cpf = 
Pedido.cpf_cliente and Pedido.id = Administrador_Pedido.id_pedido and Administrador_Pedido.id_administrador =
Administrador.id;

#-------- 
#Seção da Trigger
DELIMITER //

CREATE TRIGGER before_insert_administrador_pedido
BEFORE INSERT ON Administrador_Pedido
FOR EACH ROW
BEGIN
    DECLARE last_pedido_id INT;

    SELECT p.id INTO last_pedido_id
    FROM Pedido p
    ORDER BY p.id DESC
    LIMIT 1;

    IF NEW.id_pedido IS NULL THEN
        SET NEW.id_pedido = last_pedido_id;
    END IF;
END;
//

DELIMITER ;
#--------

Insert into Administrador_Pedido values (null, "1");

select * from Administrador_Pedido;
select * from Administrador where cpf = "19234512323";
select * from CLiente;
select * from Pedido;
SELECT pedido.id, Cliente.telefone, Cliente.email, pedido.titulo, pedido.descricao, pedido.estado FROM Cliente, Pedido,
Administrador_Pedido, Administrador where Cliente.cpf = Pedido.cpf_cliente and Pedido.id = Administrador_Pedido.id_pedido
and Administrador_Pedido.id_administrador = Administrador.id and Administrador.cpf = "19234512323";

update Pedido set estado = "Av" where id = 2;
