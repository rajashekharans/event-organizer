## Requirements
- Docker
- Docker Compose

## Build
- `cp .env.example .env`
- Make sure port 5080 (`HTTP_PORT` in `.env` file) is not being used. If it is being used by another application you will
need to change to a different one.
- Make sure `HOST_DB_PORT` in `.env` file is not being used. If it is being used, change it to a different port. This will allow you to access MySQL from host machine.
- Ensure `make` is installed in your machine, it will help in running the commands
- Register with Mapbox to obtain access token and place that token in .env file against the variable `MAP_BOX_API_KEY`
- To run the application, follow below steps:

    Build and start the container, run 
    ```
    make up
    ```
    Install dependent packages run 
    ```
    make composer-install
    ```
    Run db migrations 
    ```
    make db-migrate
    ```
    To seed the database run 
    ```
    make db-seed
    ```

## Development
- To run and generate coverage report for unit tests (requires XDebug):
 
    ```
    make run-tests
    ```

## Overview
Event Organizer is minimalist app to create, edit and list events.  UI has been provided for creating, editing and for listing events.
App uses MapBox directions API to calculate distance and duration from school to event venue.  This calculation is
done while creating the event and stored along with event information.

App is currently designed to use MapBox API, however it can be extended for any other vendors.

## Assumptions
- This app is targeted for a single school, all events are related to that school.


## Scope for improvements
- Currently, there is a limitations for adding organizers and venues, for test purposes, sample venues and organizers are created via db seed.
For production purposes, UI or API interface is needed for adding/editing organizers and venue information.
- App provides the options for sorting and filtering but no UI interface is implemented for it.
- Sorting can be performed by 

    ```
    \events?sortby={field_name}&order={asc|desc}
    ```
- Filtering can be performed by
    ```
    \events?filter={field_name}&condition={=|LIKE|>|<}&filtervalue={value}
    ```
- Current app is an monolith, for production I would prefer a microservice and separating API and UI.
- App is designed to handle event participants, but app currently does not have capability to add/edit information about event participants. Once ten events are added, db seed can be run to add even participants. This can be done by running following command:
    ```
    make add-participants
    ```
- I have added few unit tests, but there are scope for improving coverage and lot more unit and integration tests can be added.

