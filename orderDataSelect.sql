select shipping.orders.id AS id,
    shipping.orders.size AS size,
    shipping.orders.weight AS weight,
    shipping.orders.notes AS notes,
    shipping.orders.orderDate AS orderDate,
    shipping.orders.details_address AS details_address,
    shipping.orders.mount AS mount,
    shipping.clients.name AS ClientName,
    shipping.clients.phone AS ClientPhone,
    shipping.suppliers.name AS SupplierName,
    shipping.suppliers.phone AS SupplierPhone,
    originPlace.name AS originPlace,
    deliveryPlace.name AS deliveryPlace
from
    shipping.orders
    left join shipping.clients
    on
    shipping.clients.id = shipping.orders.client_id
    left join shipping.suppliers
    on
    shipping.suppliers.id = shipping.orders.supplier_id
    LEFT OUTER JOIN shipping.lk_city AS originPlace
    ON
    orders.origin_place = originPlace.id
    LEFT OUTER JOIN lk_city AS deliveryPlace
    ON
    orders.delivery_place = deliveryPlace.id
