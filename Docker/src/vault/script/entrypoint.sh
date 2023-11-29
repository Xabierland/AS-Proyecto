#!/bin/sh

# Iniciar Vault
vault server -config=/vault/config/vault.hcl &

# Esperar un momento para asegurarse de que Vault se haya iniciado
sleep 10

# Desbloquear Vault
vault operator unseal "bNu6he+xaP510PFl7VALlZg2VSHgIGtcmFcUEIxwgCc="

# Mantener el script en ejecución para que el contenedor no se detenga
tail -f /dev/null
