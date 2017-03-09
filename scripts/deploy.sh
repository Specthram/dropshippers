#!/bin/bash
echo "lancement du déploiement..."
ansible-playbook ./ansible/playbook.yml -i ./ansible/production --user=anthony