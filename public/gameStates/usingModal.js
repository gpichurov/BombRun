/**
 * Created by maya on 12-Apr-16.
 */

var reg = {};

reg.modal = new gameModal(game);

modal.createModal({
    type:"invModal",
    includeBackground: true,
    modalCloseOnInput: true,
    itemsArr: [
        {
            type: "image",
            content: "brownWindow",
            offsetY: -20,
            contentScale: 1
        },
        {
            type: "text",
            content: "Inventory",
            fontFamily: "Arial",
            fontSize: 42,
            color: "0xFEFF49",
            offsetY: -50
        }
    ]
});

function showModal() {
    reg.modal.showModal("invModal");
}