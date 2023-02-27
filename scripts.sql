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
    clients.total,
    clients.dimensions,
    clients.notes1,
    clients.notes2,
    clients.date_added,
    clients.date_updated,
    clientstate.name AS clientState,
    clientstate.id AS clientStateId,
    suppliers.name AS supplierName,
    suppliers.personalAddress AS supplierPersonalAddress,
    supplierState.name AS supplierState,
    clientstate.shippingValue
from clients
	left OUTER join lk_state as clientstate
    on clients.state_id = clientstate.id
    left OUTER join suppliers
    on clients.supplier_id = suppliers.id
    left join lk_state as supplierState
    on supplierState.id = suppliers.personalAddress
