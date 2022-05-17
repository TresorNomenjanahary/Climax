CREATE DATABASE Climax;
USE Climax;

CREATE TABLE Admin(
    idAdmin SMALLINT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(10) NOT NULL,
    prenom VARCHAR(10) NOT NULL,
    email VARCHAR(20) NOT NULL,
    mdp VARCHAR(20) NOT NULL
);

CREATE TABLE Region(
    idRegion SMALLINT PRIMARY KEY NOT NULL,
    nom VARCHAR(13) NOT NULL
);

CREATE TABLE Article(
    idArticle SMALLINT PRIMARY KEY NOt NULL,
    intitule VARCHAR(105) NOT NULL,
    description TEXT NOT NULL,
    date DATE,
    image VARCHAR(20)
);

INSERT INTO Admin VALUES(1,'Jean','Batiste','jean@gmail.com',SHA1('12345678'));
INSERT INTO Admin VALUES(2,'mika','Delanney','mika@gmail.com',SHA1('12345678'));

INSERT INTO Region VALUES(1,'Ukraine');
INSERT INTO Region VALUES(2,'France');

INSERT INTO Article VALUES(1,'Guerre en Ukraine : agir pour la paix et le climat','Greenpeace condamne la guerre du gouvernement russe en Ukraine. Greenpeace condamne la guerre conduite par le gouvernement russe en Ukraine et appelle le Président Poutine à retirer immédiatement ses forces armées et à cesser les opérations militaires. Toutes nos pensées vont aux civils qui craignent actuellement pour leur vie ou sont obligés de fuir les combats. Ce conflit est une tragédie en premier lieu pour les Ukrainien·nes mais aussi pour la population russe, qui va être affectée par ses conséquences. L’urgence de passer à des énergies propres et sans danger. Au moment même où le GIEC sortait un nouveau rapport cataclysmique sur les conséquences du changement climatique éclatait la guerre en Ukraine, révélant tous les dangers des énergies qui font le socle de notre système énergétique. Gaz et pétrole financent la guerre du régime russe contre le peuple ukrainien tout comme ils alimentent des conflits partout dans le monde. Les énergies fossiles si nocives pour le climat le sont aussi pour la paix. L’industrie nucléaire française est quant à elle fortement dépendante de la Russie et pose de graves menaces pour la sécurité, qu’elle soit civile ou militaire. Il faut d’urgence en tirer les conséquences, briser cette addiction néfaste à des énergies mortifères et construire une transition énergétique alliant souveraineté, sécurité et défis climatiques.','2022-03-14','ukraine.jpg');
INSERT INTO Article VALUES(2,'N’attendons pas 5 ans de plus pour le climat','Mobilisation pour la justice sociale et climatique, Comme lors de l’élection présidentielle, nous serons mobilisés pour ces élections législatives. Nous tenterons d’expliquer les enjeux environnementaux de ce scrutin. Nous le ferons avec le même engagement, de façon apartisane mais sans détour et sans concession, que ce soit pour défendre des propositions ambitieuses ou au contraire dénoncer des menaces graves pour la cause environnementale. D’ici là, d’autres temps forts nous attendent, à commencer par le grand rassemblement du 1er mai : nous étions dans la rue, pour la justice sociale et climatique, aux côtés d’autres organisations du mouvement climat et de nos partenaires de l’alliance pour une rupture écologique et sociale Plus jamais ça. Rejoignez-nous dans les semaines qui viennent via nos groupes locaux et nos réseaux en ligne !','2022-04-28','line.jpg');