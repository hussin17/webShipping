-- getClients
-- getClients
select
	clients.id,
    clients.name,
    clients.phone1,
    clients.phone2,
    clients.code,
    clients.instructions,
    clients.address,
    clients.nPieces,
    clients.vShipment,
    clients.weight,
    clients.dimensions,
    clients.notes1,
    clients.notes2,
    clients.date_added,
    clients.date_updated,

	shippingstatesview.id as clientStateId,
    shippingstatesview.stateName,
    shippingstatesview.listName,
    shippingstatesview.shippingValue,

    suppliers.name AS supplierName,
    suppliers.personalAddress AS supplierPersonalAddress,
    supplierstate.name AS supplierState

from
	clients

    left join suppliers
    on clients.supplier_id = suppliers.id

    left join lk_state as supplierstate
    on supplierstate.id = suppliers.personalAddress

    left JOIN shippingstatesview
    on shippingstatesview.state_id = clients.state_id
    GROUP by id;

-- shippingStatesView
select
	shippingstates.id,
    shippingstates.list_id,
    shippingstates.state_id,
    shippingstates.shippingValue,
	shippinglist.name as listName,
    lk_state.name as stateName
FROM
	shippingstates
    INNER JOIN shippinglist
    ON
    shippingstates.list_id = shippinglist.id
    INNER JOIN lk_state
    ON
    lk_state.id = shippingstates.state_id;
