<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Ticket Creado</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td style="padding: 20px 0;">
                <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" style="background-color: #ffffff; border: 1px solid #dddddd; border-radius: 10px;">
                    <tr>
                        <td style="padding: 20px; background-color: #007bff; color: #ffffff; border-radius: 10px 10px 0 0;">
                            <h1 style="margin: 0; font-size: 24px;">Nuevo Ticket Creado</h1>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 20px;">
                            <p style="font-size: 18px; margin-bottom: 20px;">Estimado Administrador,</p>
                            <p style="font-size: 16px; margin-bottom: 20px;">
                                Se ha creado un nuevo ticket en relación al siguiente activo:
                            </p>
                            <ul style="font-size: 16px; line-height: 1.6; margin-bottom: 20px; padding-left: 20px; list-style-type: disc;">
                                <li><strong>Nombre del Activo:</strong> {{ $ticket->type }}</li>
                                <li><strong>Solicitud:</strong> {{ $ticket->request}}</li>
                                <li><strong>Tipo de solicitud:</strong> {{ $ticket->type_request }}</li>
                                <li><strong>Prioridad</strong> {{ $ticket->priority }}</li>
                            </ul>
                            <p style="font-size: 16px;">Por favor, revisa los detalles del ticket en el sistema.</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 20px; background-color: #f4f4f4; text-align: center; border-radius: 0 0 10px 10px;">
                            <p style="font-size: 14px; color: #777777; margin: 0;">
                                © {{ date('Y') }} https://bioingenieria.inventores.org
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
