
delimiter $	
create procedure clearing_limit_order()
begin
declare name varchar(10);
declare price,actual_price float;
declare orderId ,clientId varchar(20);
declare end_of_table tinyint;
declare cur_order cursor for select order_id from Orders where Orders.order_type = 1 and Orders.status = "Pending";
declare continue handler for not found set end_of_table = 1;

set end_of_table = 0;
open cur_order;

fetch cur_order into orderId;
select Orders.price,Orders.ticker_name,Orders.client_id into price,name,clientId from Orders where order_id = orderId;

while end_of_table = 0 do

	if(price = (select Stock_detail.price from Stock_detail where Stock_detail.ticker_name = name)) then

		update Orders set Orders.status = "Executed" where Orders.order_id = orderId; 
		call add_position_holdings(clientId,orderId,price);

	end if;

	
	fetch cur_order into orderId;
select Orders.price,Orders.ticker_name,Orders.client_id into price,name,clientId from Orders where order_id = orderId;

#	select Stock_detail.price into actual_price from Stock_detail where Stock_detail.ticker_name = name;


end while;
close cur_order;
end$

create procedure clearing_market_order()
	begin

declare price float;
declare name varchar(10);
declare orderId ,clientId varchar(20);
declare end_of_table tinyint;
declare cur_order cursor for select order_id from Orders where Orders.order_type = 0 and Orders.status = "Pending";
declare continue handler for not found set end_of_table = 1;

set end_of_table = 0;
open cur_order;

fetch cur_order into orderId;
select Orders.ticker_name,Orders.client_id,Orders.price into name,clientId,price from Orders where order_id = orderId;

while end_of_table = 0 do

	
		update Orders set Orders.status = "Executed" where Orders.order_id = orderId; 
		call add_position_holdings(clientId,orderId,price);

	
	
	fetch cur_order into orderId;
select Orders.ticker_name,Orders.client_id,Orders.price into name,clientId,price from Orders where order_id = orderId;

#	select Stock_detail.price into actual_price from Stock_detail where Stock_detail.ticker_name = name;


end while;
close cur_order;
end$



delimiter $
create procedure add_position_holdings(in clientId varchar(20),in orderId varchar(20),in price float)

begin
declare new_ticker_name varchar(10);
declare p_type tinyint;
declare new_ticker_size bigint;

select Orders.ticker_name into new_ticker_name from Orders where Orders.order_id = orderId;
select Orders.ticker_size into new_ticker_size from Orders where Orders.order_id = orderId;
select Orders.position_type into p_type from Orders where Orders.order_id = orderId;


if p_type = 1 then   # insert/update Holdings

	insert into Holdings values(clientId,new_ticker_name,new_ticker_size,price);

else

	insert into Positions values(clientId,new_ticker_name,new_ticker_size,price);

end if;

end$
