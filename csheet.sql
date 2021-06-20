select
	jo.idjo
    , jo.NoJO
    , jo.TglJO
    , customer.Nama as customerNama
    , shipper.Nama as shipperNama
    , jo.TglMB
    , lokasi.Nama as lokasiNama
    , jod.idjod
    , jod.idarmada
    , armada.Merk
    , armada.Tipe
    , armada.NoPol
    , jod.no_cont
from
	t30_jo jo
    left join t05_customer customer on jo.idcustomer = customer.idcustomer
    left join t06_shipper shipper on jo.idshipper = shipper.idshipper
    left join t12_lokasi lokasi on jo.idlokasi = lokasi.idlokasi
    left join t35_jod jod on jo.idjo = jod.idjo
    left join t08_armada armada on jod.idarmada = armada.idarmada
where
	jo.idjo = 8