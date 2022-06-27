create table games
(
    id_game      serial
        constraint games_pk
            primary key,
    picture      varchar(255) not null,
    name         varchar(255) not null,
    platform     varchar(100) not null,
    description  text         not null,
    datepremiere date         not null,
    type         varchar(100) not null
);

alter table games
    owner to jvbndeocdfmnpc;

create unique index games_id_game_uindex
    on games (id_game);



create table rola
(
    id_role integer default nextval('"Rola_ID_Role_seq"'::regclass) not null
        constraint rola_pk
            primary key,
    role    varchar(100)                                            not null
);

alter table rola
    owner to jvbndeocdfmnpc;

create unique index rola_id_role_uindex
    on rola (id_role);

create unique index rola_role_uindex
    on rola (role);



create table userdetails
(
    id_userdetail serial
        constraint userdetails_pk
            primary key,
    name          varchar(255) not null,
    surname       varchar(255) not null,
    createddate   date         not null,
    createdtime   time         not null
);

alter table userdetails
    owner to jvbndeocdfmnpc;

create unique index userdetails_id_userdetail_uindex
    on userdetails (id_userdetail);
	
	

create table users
(
    id_user       serial
        constraint users_pk
            primary key,
    fk_userdetail integer      not null
        constraint fk_users_userdetails
            references userdetails
            on update cascade on delete cascade,
    fk_role       integer      not null
        constraint fk_users_role
            references rola
            on update set null on delete set null,
    email         varchar(255) not null,
    password      varchar(255) not null
);

alter table users
    owner to jvbndeocdfmnpc;

create unique index users_fk_userdetail_uindex
    on users (fk_userdetail);

create unique index users_id_user_uindex
    on users (id_user);



create table rates
(
    fk_game integer not null
        constraint fk_rates_games
            references games
            on update cascade on delete cascade,
    fk_user integer
        constraint fk_rates_users
            references users
            on update cascade on delete cascade,
    rate    integer not null
);

alter table rates
    owner to jvbndeocdfmnpc;



INSERT INTO public.games (id_game, picture, name, platform, description, datepremiere, type) VALUES (10, 'fifa-22.jpg', 'FIFA 22', 'Xbox', 'FIFA 22 to najnowsza odsłona cyklu gier piłkarskich tworzonych przez EA Sports od 1993 roku. Naszym zadaniem jak zwykle jest wygrywanie meczów, turniejów i całych sezonów w trybie kariery i pojedynków wieloosobowych. W FIF-ie 22 znalazły się setki licencjonowanych klubów, tysiące wiernie odwzorowanych piłkarzy i realistycznie wyglądające stadiony, które znamy z telewizyjnych kamer.', '2021-09-27', 'Sport');
INSERT INTO public.games (id_game, picture, name, platform, description, datepremiere, type) VALUES (2, 'gothic.jpg', 'Gothic 2 Noc Kruka', 'PC', 'Gothic 2 to RPG ukazane z perspektywy trzeciej osoby, w którym wcielamy się w znanego z poprzedniej części bezimiennego bohatera. Gra rozwija założenia pierwowzoru zarówno pod względem rozgrywki, jak i fabuły. Za jego stworzenie odpowiada niemieckie studio Piranha Bytes. Gra otrzymała bardzo dobre recenzje w momencie premiery i, podobnie jak pierwsza część, zyskała status kultowej w rejonie Europy Środkowo-Wschodniej. Na przestrzeni lat wykształciła się wokół niej spora społeczność oraz rozwinęła się zaawansowana scena modderska.', '2003-08-22', 'RPG');
INSERT INTO public.games (id_game, picture, name, platform, description, datepremiere, type) VALUES (11, 'minecraft.jpg', 'Minecraft', 'PC', 'Minecraft to unikatowa produkcja, która – choć zasadniczo należąca do tzw. sandboksów – wymyka się klasycznej klasyfikacji gatunkowej. Gra opiera się na mechanice craftingu i oferuje olbrzymią swobodę – gracze mogą tworzyć przeróżne przedmioty, budynki, konstrukcje i lokacje, a nawet całe miasta. Omawiany tytuł jest dziełem Mojang Studios, które w 2014 roku zostało wykupione przez koncern Microsoft.', '2011-11-18', 'Survival');
INSERT INTO public.games (id_game, picture, name, platform, description, datepremiere, type) VALUES (1, 'gtav.jpg', 'Grand Theft Auto V', 'PC', 'Akcja gry rozpoczyna się w North Yankton około 2004 roku, gdy Michael Townley i Trevor Philips wraz ze swoim znajomym Bradem napadają na lokalny bank. Po zgarnięciu łupu na zewnątrz czeka oddział policji. Gangsterom udaje się dostać do samochodu i rozpocząć ucieczkę, jednak ta kończy się zderzeniem z pędzącym pociągiem. Bohaterowie cudem przeżywają kolizję, ale na miejscu zdarzenia czekają na nich agenci federalni, którzy zabijają Brada oraz udaje im się postrzelić Townleya.', '2015-05-16', 'Strzelanka');
INSERT INTO public.games (id_game, picture, name, platform, description, datepremiere, type) VALUES (3, 'metin2.jpg', 'Metin2', 'PC', 'Fabuła gry umiejscowiona jest w świecie fantasy inspirowanym kulturą Dalekiego Wschodu. „Kamienie Metin”, które spadły na ziemię spowodowały chaos w krainie, wojny pomiędzy królestwami oraz ataki zwierząt i potworów. Celem gry jest walka ze skutkami mrocznego wpływu kamieni.

Gra rozpoczyna się stworzeniem postaci. Należy wybrać jedno z trzech królestw, w którym gracz będzie walczył, imię, płeć oraz jedną z pięciu klas postaci. Każda z nich dzieli się z kolei na dwie profesje (prócz Likana, który posiada tylko jedną profesję), które można rozwijać w dowolny sposób.', '2007-07-15', 'MMO RPG');
INSERT INTO public.games (id_game, picture, name, platform, description, datepremiere, type) VALUES (4, 'lol.jpg', 'League of Legends', 'PC', 'Gry są rozgrywane na mapie Summoner''s Rift, która jest jedyną dostępny w grze na profesjonalnym poziomie. Naprzeciwko siebie stają dwie pięcioosobowe drużyny, próbujące zniszczyć Nexus drużyny przeciwnej, po drodze pokonując stwory i struktury na liniach oraz potwory w dżungli. Nexus każdej drużyny znajduje się w sercu bazy, obok "fontanny" gdzie gracze rozpoczynają grę oraz pojawiają się po śmierci w trakcie gry. Obie bazy znajdują się na przeciwległych końcach mapy. Drogę do każdej bazy blokują 3 wieże rozlokowane na trzech liniach nazywanych górną, środkową oraz dolną. Za trzecią wieżą znajduje się struktura nazywana Inhibitorem, która po zniszczeniu powoduje przywołanie "super stworów" o potężnych statystykach ofensywnych i defensywnych. Rozgrywki mogą trwać od około 15 minut do ponad godziny.', '2009-10-27', 'MMO RPG');
INSERT INTO public.games (id_game, picture, name, platform, description, datepremiere, type) VALUES (5, 'ug2.jpg', 'Need for Speed Underground 2', 'PC', 'Cała fabuła została opowiedziana w formie komiksu, a jego główną bohaterką, poza naszym kierowcą, jest Rachel grana przez Brooke Burke. Jest to pośrednia kontynuacja poprzedniej gry z cyklu, NFS Underground. Fabułę rozpoczyna filmik, z którego gracz dowiaduje się, że bohater był niepokonany w Olimpic City (miasto z 1. części gry), jednak jego oponenci próbowali się go pozbyć, co w końcu jednemu z nich się udało. Gracz trafia do szpitala na półroczną rehabilitację. Po wyjściu udaje się do Bayview aby zemścić się na oprawcy. Poza tym, Bayview jest uważane za raj dla wszystkich maniaków tuningu i nielegalnych wyścigów ulicznych. Samantha pomaga bohaterowi po raz ostatni, sponsorując mu jego pierwszy samochód i przekazując w ręce Rachel Teller, która zostawia na lotnisku swój samochód. Rachel chce się jak najszybciej spotkać.', '2004-11-04', 'Wyścigi');
INSERT INTO public.games (id_game, picture, name, platform, description, datepremiere, type) VALUES (6, 'twierdza-krzyzowiec.jpg', 'Twierdza: Krzyżowiec', 'PC', 'Stronghold: Crusader to sequel świetnej gry strategicznej Stronghold (w Polsce Twierdza), tym razem przenoszący nas do świata Bliskiego Wschodu w epoce wypraw krzyżowych (XI – XII wiek). Podobnie jak poprzednik, Stronghold: Crusader jest określany mianem „symulator twierdzy”. Gracz może od podstaw wybudować swoją twierdzę, zapewnić jej ludności i żołnierzom wyżywienie oraz odeprzeć niejeden potężny atak, czy nawet samemu zdobyć wrogi zamek. W stosunku do Twierdzy poza oczywistą zmianą scenerii oferuje m.in. cztery oddzielne kampanie, zarówno po stronie europejskiego rycerstwa prowadzonego przez Ryszarda Lwie Serce, jak i arabskich wojowników dowodzonych przez Saladyna. Do tego nowe jednostki, m.in. konni łucznicy, teutońscy rycerze, grenadierzy i przenośne ballisty oraz nowy element strategiczny – woda, a raczej jej brak.', '2002-09-25', 'Strategia');
INSERT INTO public.games (id_game, picture, name, platform, description, datepremiere, type) VALUES (7, 'wiedzmin3dzikigon.jpg', 'Wiedźmin 3: Dziki Gon', 'PC', 'W grze Wiedźmin 3: Dziki Gon ponownie wcielamy się w znanego z wcześniejszych odsłon wiedźmina. Główna oś fabularna obraca się wokół kilku oddzielnych wątków. Wśród nich znalazło się poszukiwanie utraconej miłości Geralta oraz inwazja Nilfgaardu na Królestwa Północy. Spróbujemy też powstrzymać tytułowy Dziki Gon, prześladujący wiedźmina zarówno w powieściach, jak i obecny w pierwszej i w nikłym stopniu w drugiej części serii. Wszystkie te główne zadania oferują filmową jakość opowiadanej historii, z rozgałęzionymi ścieżkami wydarzeń, imponującymi scenkami przerywnikowymi i starannie wyreżyserowanymi sekwencjami.', '2015-05-19', 'RPG');
INSERT INTO public.games (id_game, picture, name, platform, description, datepremiere, type) VALUES (8, 'gothic1.jpg', 'Gothic', 'PC', 'Akcja gry przenosi graczy do fantastycznego Królestwa Myrtany, którym rządzi król Rhobar II. Wcielając się w postać Bezimienngo trafiają oni do kolonii karnej na wyspie Khorinis. Otacza ją magiczna, przenikalna jedynie z zewnątrz bariera, którą stworzyli arcymagowie. Niestety, w trakcie inkantacji wydarzyło się coś niespodziewanego. Zasięg zaklęcia okazał się większy niż przewidywano i bariera otoczyła cały obszar Górniczej Doliny, więżąc także magów.', '2001-03-15', 'RPG');
INSERT INTO public.games (id_game, picture, name, platform, description, datepremiere, type) VALUES (9, 'forza-horizon-5.jpg', 'Forza Horizon 5', 'Xbox', 'Forza Horizon 5 zabiera nas w podróż do Meksyku – to najrozleglejsza mapa w historii serii, większa o ok. 50% od tej, którą zawierała Forza Horizon 4. Występują tu między innymi pustynia, las deszczowy, starożytne ruiny, potężny kanion, malownicze plaże, jak również wioski i miasto Guanajuato. Dodatkowo na zdobycie czeka tu najwyżej położony punkt w dziejach cyklu – wierzchołek wulkanu.', '2021-11-09', 'Wyścigi');
INSERT INTO public.games (id_game, picture, name, platform, description, datepremiere, type) VALUES (12, 'sea-of-thieves.jpg', 'Sea of Thieves', 'Xbox', 'Sea of Thieves to rozgrywająca się w otwartym świecie gra MMO utrzymana w typowo pirackich klimatach. Za stworzenie tytułu odpowiedzialne jest legendarne studio Rare, czyli jeden z najstarszych brytyjskich deweloperów, mający na swoim koncie m.in. tak słynne serie, jak Donkey Kong Country, Banjo-Kazooie czy Killer Instinct. Po wykupieniu studia przez koncern Microsoft jego gwiazda nieco przygasła, zaś w ostatnich latach dało się ono poznać głównie dzięki stworzonej dla giganta z Redmond serii Kinect Sports. Sea of Thieves zostało zapowiedziane na targach E3 2015 i ukazało się na rynku niespełna dwa lata później, na konsolach Xbox One oraz komputerach PC z systemem Windows 10.', '2018-03-20', 'Strzelanka');



INSERT INTO public.rola (id_role, role) VALUES (1, 'Admin');
INSERT INTO public.rola (id_role, role) VALUES (2, 'User');



INSERT INTO public.userdetails (id_userdetail, name, surname, createddate, createdtime) VALUES (1, 'Jakub', 'Godfryd', '2022-06-20', '19:49:13');
INSERT INTO public.userdetails (id_userdetail, name, surname, createddate, createdtime) VALUES (2, 'Adrian', 'Nowak', '2022-06-20', '19:49:53');
INSERT INTO public.userdetails (id_userdetail, name, surname, createddate, createdtime) VALUES (9, 'Marcin', 'Nowak', '2022-06-27', '19:42:58');
INSERT INTO public.userdetails (id_userdetail, name, surname, createddate, createdtime) VALUES (10, 'Franciszek', 'Nowak', '2022-06-27', '20:00:26');
INSERT INTO public.userdetails (id_userdetail, name, surname, createddate, createdtime) VALUES (11, 'Jakub', 'Kowalski', '2022-06-27', '20:53:54');



INSERT INTO public.users (id_user, fk_userdetail, fk_role, email, password) VALUES (1, 1, 1, 'godfrydkuba@gmail.com', '$2y$10$Idp0eJ4MpiVw0UauiAE5Nu3Gtdlghl8Q3MLlisooYM3qSJmJ7P2VC');
INSERT INTO public.users (id_user, fk_userdetail, fk_role, email, password) VALUES (2, 2, 2, 'adrian@nowak.com', '$2y$10$HqCNTm/lwcriVCSXD0H5.u37HF0f0GD5RCDeHtaCbwqLk61cQLQfG');
INSERT INTO public.users (id_user, fk_userdetail, fk_role, email, password) VALUES (9, 9, 2, 'marcin@nowak.com', '$2y$10$iNvsUqsGjew97R60ZbDpPOFAaG/ILRJoR8d4Xag6nkaQ8MqKE5Qeq');
INSERT INTO public.users (id_user, fk_userdetail, fk_role, email, password) VALUES (10, 10, 2, 'franek@nowak.com', '$2y$10$onNhcs4/CNSwpkbNsNXVpudayg6uIOCVZJTaj9ELbYcwiIVwrNVN6');
INSERT INTO public.users (id_user, fk_userdetail, fk_role, email, password) VALUES (11, 11, 2, 'kuba@kowalski.pl', '$2y$10$meWf19bY9621i/UKexZ9YuKmItF4FDfjbd2xWd9WgO61FWrHh0/0S');



INSERT INTO public.rates (fk_game, fk_user, rate) VALUES (2, 1, 34);
INSERT INTO public.rates (fk_game, fk_user, rate) VALUES (2, 1, 34);
INSERT INTO public.rates (fk_game, fk_user, rate) VALUES (2, 1, 34);
INSERT INTO public.rates (fk_game, fk_user, rate) VALUES (1, 1, 8);
INSERT INTO public.rates (fk_game, fk_user, rate) VALUES (3, 1, 78);
INSERT INTO public.rates (fk_game, fk_user, rate) VALUES (3, 2, 25);
INSERT INTO public.rates (fk_game, fk_user, rate) VALUES (4, 1, 55);
INSERT INTO public.rates (fk_game, fk_user, rate) VALUES (4, 2, 70);
INSERT INTO public.rates (fk_game, fk_user, rate) VALUES (1, 2, 80);
INSERT INTO public.rates (fk_game, fk_user, rate) VALUES (5, 1, 95);
INSERT INTO public.rates (fk_game, fk_user, rate) VALUES (6, 1, 89);
INSERT INTO public.rates (fk_game, fk_user, rate) VALUES (10, 1, 56);
INSERT INTO public.rates (fk_game, fk_user, rate) VALUES (7, 1, 87);
INSERT INTO public.rates (fk_game, fk_user, rate) VALUES (8, 1, 90);
INSERT INTO public.rates (fk_game, fk_user, rate) VALUES (9, 1, 80);
INSERT INTO public.rates (fk_game, fk_user, rate) VALUES (2, 2, 100);
INSERT INTO public.rates (fk_game, fk_user, rate) VALUES (10, 2, 10);
INSERT INTO public.rates (fk_game, fk_user, rate) VALUES (6, 2, 1);
INSERT INTO public.rates (fk_game, fk_user, rate) VALUES (5, 2, 1);
INSERT INTO public.rates (fk_game, fk_user, rate) VALUES (9, 2, 70);
INSERT INTO public.rates (fk_game, fk_user, rate) VALUES (7, 2, 90);
INSERT INTO public.rates (fk_game, fk_user, rate) VALUES (4, 9, 94);
INSERT INTO public.rates (fk_game, fk_user, rate) VALUES (9, 9, 80);
INSERT INTO public.rates (fk_game, fk_user, rate) VALUES (10, 9, 80);
INSERT INTO public.rates (fk_game, fk_user, rate) VALUES (2, 9, 80);
INSERT INTO public.rates (fk_game, fk_user, rate) VALUES (8, 10, 80);
INSERT INTO public.rates (fk_game, fk_user, rate) VALUES (10, 10, 70);
INSERT INTO public.rates (fk_game, fk_user, rate) VALUES (11, 1, 34);
INSERT INTO public.rates (fk_game, fk_user, rate) VALUES (12, 1, 80);
INSERT INTO public.rates (fk_game, fk_user, rate) VALUES (12, 10, 80);
INSERT INTO public.rates (fk_game, fk_user, rate) VALUES (11, 10, 90);
INSERT INTO public.rates (fk_game, fk_user, rate) VALUES (4, 11, 90);
INSERT INTO public.rates (fk_game, fk_user, rate) VALUES (8, 11, 90);
INSERT INTO public.rates (fk_game, fk_user, rate) VALUES (9, 11, 89);
INSERT INTO public.rates (fk_game, fk_user, rate) VALUES (10, 11, 100);
INSERT INTO public.rates (fk_game, fk_user, rate) VALUES (6, 11, 1);