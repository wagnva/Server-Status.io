export default function(echo, store, userID){

    echo.channel("App.User." + userID)
        .listen("ServerStatusChangeEvent", (e) => {

            /*
             * The ServerStatusChangeEvent tells us, that a new status was added to a server
             * Expects to have the following data:
             * 1. forServer: id of the server
             * 2. currentStatus: the new status
             */

            console.log(e);

            //add the status to the status module
            store.commit("statuses/add", e.currentStatus);

            //add the status id to the server
            store.commit("server/addStatus", {
                serverID: e.forServer,
                statusID: e.currentStatus.id
            });

        });

}