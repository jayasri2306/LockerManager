CREATE TABLE Lockers (
    LockerID INT PRIMARY KEY AUTO_INCREMENT,
    LockerNumber VARCHAR(20) NOT NULL,
    Status ENUM('Available', 'Occupied', 'Out of Service') NOT NULL DEFAULT 'Available'
   
);
