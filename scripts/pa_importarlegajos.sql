alter proc pa_importarlegajos
as
BEGIN

	SET NOCOUNT ON

	declare @Sierr int
	set @Sierr = 0

	begin tran

	insert usuario
	select mr.legajo, empresa = 1, gerencia = 7, sector = 12, area = 13, categoria = null, mr.NOMBRE, username = '', webpass = '', lower(left(mr.NOMBRE, 3)) + SUBSTRING(mr.cuil, 8,3), 
			[admin] = 0, cambiapass = 1, ultimoacceso = '19800101', SUBSTRING(mr.cuil, 3,8), activo = 1, fechamodificacion = getdate()
	FROM [serverdbmdq].[mdq].[dbo].[rrhh] mr 
		left join usuario u on u.legajo = mr.LEGAJO and u.empresa = 1
	where u.legajo is null and mr.if_del <> 1 and mr.LEGAJO < 8888

	insert usuario
	select mr.legajo, empresa = 1, gerencia = 7, sector = 12, area = 13, categoria = null, mr.NOMBRE, username = '', webpass = '', lower(left(mr.NOMBRE, 3)) + SUBSTRING(mr.cuil, 8,3), 
			[admin] = 0, cambiapass = 1, ultimoacceso = '19800101', SUBSTRING(mr.cuil, 3,8), activo = 1, fechamodificacion = getdate()
	FROM [serverdball].[sportone].[dbo].[rrhh] mr 
		left join usuario u on u.legajo = mr.LEGAJO and u.empresa = 2
	where u.legajo is null and mr.if_del <> 1 and mr.LEGAJO < 8888

	insert usuario
	select mr.legajo, empresa = 1, gerencia = 7, sector = 12, area = 13, categoria = null, mr.NOMBRE, username = '', webpass = '', lower(left(mr.NOMBRE, 3)) + SUBSTRING(mr.cuil, 8,3), 
			[admin] = 0, cambiapass = 1, ultimoacceso = '19800101', SUBSTRING(mr.cuil, 3,8), activo = 1, fechamodificacion = getdate()
	FROM [serverdball].[stadio].[dbo].[rrhh] mr 
		left join usuario u on u.legajo = mr.LEGAJO and u.empresa = 1001
	where u.legajo is null and mr.if_del <> 1 and mr.LEGAJO < 8888

if @SiErr > 0 
	rollback
	else 
	commit

	SELECT @siErr

end

-- pa_importarlegajos
