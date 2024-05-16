
CREATE TABLE ExpeditionTypes (
    typeID INT AUTO_INCREMENT PRIMARY KEY,
    typeName VARCHAR(255) NOT NULL
);

CREATE TABLE Expeditions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    expeditionType VARCHAR(255) NOT NULL,
    participantName VARCHAR(255) NOT NULL,
    emergencyContact VARCHAR(255) NOT NULL,
    date DATE NOT NULL,
    transport VARCHAR(255) NOT NULL
);

CREATE TABLE Participants (
    participantID INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    emergencyContact VARCHAR(255) NOT NULL
);

CREATE TABLE Guides (
    guideID INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    expertise VARCHAR(255) NOT NULL
);

CREATE TABLE Equipment (
    equipmentID INT AUTO_INCREMENT PRIMARY KEY,
    itemName VARCHAR(255) NOT NULL,
    expeditionTypeID INT,
    FOREIGN KEY (expeditionTypeID) REFERENCES ExpeditionTypes(typeID)
);

CREATE TABLE Routes (
    routeID INT AUTO_INCREMENT PRIMARY KEY,
    location VARCHAR(255) NOT NULL,
    difficulty VARCHAR(255) NOT NULL,
    expeditionTypeID INT,
    FOREIGN KEY (expeditionTypeID) REFERENCES ExpeditionTypes(typeID)
);

CREATE TABLE Transport (
    transportID INT AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(255) NOT NULL,
    capacity INT NOT NULL
);

CREATE TABLE Reservations (
    reservationID INT AUTO_INCREMENT PRIMARY KEY,
    expeditionID INT,
    participantID INT,
    date DATE NOT NULL,
    FOREIGN KEY (expeditionID) REFERENCES Expeditions(id),
    FOREIGN KEY (participantID) REFERENCES Participants(participantID)
);

INSERT INTO ExpeditionTypes (typeName) VALUES 
('Mountaineering'),
('River Rafting'),
('Desert Trail'),
('Desert ATV'),
('Rock Climbing'),
('Skydive'),
('Ballooning');

INSERT INTO Equipment (itemName, expeditionTypeID) VALUES
('Climbing Gear', (SELECT typeID FROM ExpeditionTypes WHERE typeName = 'Mountaineering')),
('Raft', (SELECT typeID FROM ExpeditionTypes WHERE typeName = 'River Rafting')),
('Hiking Boots', (SELECT typeID FROM ExpeditionTypes WHERE typeName = 'Desert Trail')),
('ATV', (SELECT typeID FROM ExpeditionTypes WHERE typeName = 'Desert ATV')),
('Climbing Shoes', (SELECT typeID FROM ExpeditionTypes WHERE typeName = 'Rock Climbing')),
('Parachute', (SELECT typeID FROM ExpeditionTypes WHERE typeName = 'Skydive')),
('Balloon', (SELECT typeID FROM ExpeditionTypes WHERE typeName = 'Ballooning'));

INSERT INTO Routes (location, difficulty, expeditionTypeID) VALUES
('La Sal Mountains', 'Hard', (SELECT typeID FROM ExpeditionTypes WHERE typeName = 'Mountaineering')),
('Colorado River', 'Medium', (SELECT typeID FROM ExpeditionTypes WHERE typeName = 'River Rafting')),
('Moab Desert Trail', 'Medium', (SELECT typeID FROM ExpeditionTypes WHERE typeName = 'Desert Trail')),
('Moab Desert', 'Easy', (SELECT typeID FROM ExpeditionTypes WHERE typeName = 'Desert ATV')),
('Hard Crack', 'Hard', (SELECT typeID FROM ExpeditionTypes WHERE typeName = 'Rock Climbing')),
('Desert', 'Easy', (SELECT typeID FROM ExpeditionTypes WHERE typeName = 'Skydive')),
('Desert', 'Easy', (SELECT typeID FROM ExpeditionTypes WHERE typeName = 'Ballooning'));
