const PATH = "http://localhost/Clinica/";

import { hideLoad } from "./loading.mjs";
import { showPicture, openImage, login, editProfileUser } from "./user-actions.mjs";
import { get} from "./crud.mjs";

window.addEventListener("load", function () {

    hideLoad();

    login();
    editProfileUser();
    get();
    showPicture();
});