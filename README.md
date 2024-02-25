# Co-Voiturage Platform Project Requirements

## Introduction
Our group's role is to create a web application for a carpooling project while adhering to good design and development practices and respecting ISO and AFNOR standards in interface creation.

### Technology and Tools Selection:
Our team has agreed on the following technology stack:
- **Backend**: Laravel 10
- **Frontend**: VueJS 3
- **Modeling**: UML

## I. Identification of Actors:

### Actors:
- **Administrator**
- **Users**: 
  - **Passenger**
  - **Driver**

## II. Identification of Key Activities:

### Key Activities of Actors:

1. **Passenger**:
   - Registration
   - Searching for a ride:
     - Simple search
     - Advanced search
     - Selecting a ride
     - Reserving a seat
     - Payment

2. **Driver**:
   - Registration
   - Managing a ride

3. **Administrator**:
   - Managing user accounts (approving verification requests, verifying supporting documents)
   - Viewing the list of complaints received by various platform users
   - Managing announcements (rides posted by drivers)

## III. Folder Structure:

co-voiturage-platform/
│
├── backend/
│ ├── app/
│ ├── config/
│ ├── database/
│ ├── public/
│ └── ...
│
├── frontend/
│ ├── public/
│ ├── src/
│ ├── node_modules/
│ └── ...
│
└── documentation/
├── UML_diagrams/
│ ├── use_case/
│ ├── class_diagram/
│ └── ...
└──────────────────── 
