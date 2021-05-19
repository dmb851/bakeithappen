CREATE TABLE Ingredient (
    inID    int AUTO_INCREMENT,
    inName  varchar(255),
    PRIMARY KEY(inID)
);

CREATE TABLE Recipe (
    recID    int AUTO_INCREMENT,
    recName  varchar(255),
    recInstruct varchar(255),
    PRIMARY KEY(recID)
);

CREATE TABLE Recipe_Ingredient (
    riID    int AUTO_INCREMENT,    
    inID    int,
    recID   int,
    PRIMARY KEY(riID),
    FOREIGN KEY(inID) REFERENCES Ingredient(inID),
    FOREIGN KEY(recID) REFERENCES Recipe(recID)
);