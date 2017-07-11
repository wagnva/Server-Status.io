export default function(echo, store, userID){

    echo.private("App.User." + userID)
        .listen("ServerStatusChangeEvent", (e) => {

            /*
             * The ServerStatusChangeEvent tells us, that a new status was added to a server
             * Expects to have the following data:
             * 1. forServer: id of the server
             * 2. currentStatus: the new status
             */

            store.dispatch("server/addStatus", e);

        });

}