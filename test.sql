
delete from Ingredient;
delete from Recipe;
delete from Recipe_Ingredient; 

insert into Ingredient (inName)
values  ("rice");
insert into Ingredient (inName)
values  ("broccoli");
insert into Ingredient (inName)
values  ("chicken");
insert into Ingredient (inName)
values  ("teriyaki");

insert into Recipe (recName, recInstruct)
values  ("chicken teriyaki", "Cook 1lb rice in instant pot, steam broccoli, lightly coat and fry chicken in teriyaki sauce, combine and serve");

--queries for recipes that contain ALL 4 of the ingredients listed. 
SELECT recName, recInstruct 
FROM Recipe AS r 
INNER JOIN recipe_ingredient i ON i.recId = r.recId 
INNER JOIN Ingredient x ON x.inId = i.inId 
WHERE x.inName IN ("chicken", "rice", "broccoli", "teriyaki") 
GROUP BY r.recName 
HAVING COUNT(*) = 4

--Inserts into Recipe with Name and Instructions
INSERT INTO Recipe (recName, recInstruct) 
VALUES('Peanut Butter and Jelly', 'Spread Peanut Butter on one slice of bread, Spread Jelly on the other slice, Put slices together, Cut sandwich diagonally, Serve with milk');

--Inserts an Ingredient into the Ingredient table only if it does not exist already.
INSERT INTO Ingredient(inName) (SELECT 'rice' FROM dual WHERE NOT EXISTS (SELECT inName FROM ingredient WHERE inName='rice'));

-- Inserts properly into recipe ingredient table. 
INSERT INTO recipe_ingredient(recId, inId) 
VALUES((SELECT recId FROM recipe WHERE recName = 'chicken teriyaki'), (SELECT inId FROM ingredient WHERE inName = 'rice'))