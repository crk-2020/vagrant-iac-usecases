# kubernetes cluster with Vagrant and Ansible

```shell
## clone the repo
$ git clone https://github.com/ginigangadharan/vagrant-iac-usecases

## swith to the directory
$ cd virtualbox-kubernetes

## create cluster
$ vagrant up
```

Wait for nodes to power on and install packages (5-10 min depends on your configuration)

## Access the Cluster

```shell
## login to master node (use the correct master node name)
$ vagrant ssh k8s-master

## export kubeconfig
vagrant@k8s-master:~$ export KUBECONFIG=$HOME/.kube/config

## check nodes
vagrant@k8s-master:~$ kubectl get nodes
NAME         STATUS     ROLES                  AGE   VERSION
k8s-master   NotReady   control-plane,master   20m   v1.21.1       
node-1       NotReady   <none>                 11m   v1.21.1       
node-2       NotReady   <none>                 69s   v1.21.1      
```

## Install Calico Network

You can choose other network options as needed.

```shell
## swtich to /vagrant directory on k8s-master
## content of your Vagrant project directory will be mounted there.
vagrant@k8s-master:~$ cd /vagrant/

## Intall calico and wait for pods to create
vagrant@k8s-master:/vagrant$ kubectl create -f calico.yaml

## Wait for Calico pods to create and running
vagrant@k8s-master:/vagrant$ kubectl get po -n kube-system |grep calico

## Wait for coredns pods to create and running
vagrant@k8s-master:/vagrant$ kubectl get po -n kube-system |grep coredns
```

## Install and Access Dashboard

Check [documentation](https://kubernetes.io/docs/tasks/access-application-cluster/web-ui-dashboard/) for latest version of Kubernetes dashboard.

```shell
## install dashboard resources
vagrant@k8s-master:~$ kubectl apply -f https://raw.githubusercontent.com/kubernetes/dashboard/v2.4.0/aio/deploy/recommended.yaml

## Get Token to Access Dashboard
vagrant@k8s-master:~$ KUBETOKEN=$(kubectl -n kube-system get secret | grep default-token | awk '{print $1}')

## Copy Token Value from below command
vagrant@k8s-master:~$ kubectl -n kube-system describe secret ${KUBETOKEN} | grep token: | awk '{print $2}'
```

Note: You can also create a seperate user for accessing the dashboard; refer [Creating Sample User documentation](https://github.com/kubernetes/dashboard/blob/master/docs/user/access-control/creating-sample-user.md).

**Enable proxy**

```shell
vagrant@k8s-master:~$ kubectl proxy --address='0.0.0.0'
Starting to serve on [::]:8001
```

Now you can open the url from you host machine browser as `http://localhost:8001/api/v1/namespaces/kubernetes-dashboard/services/https:kubernetes-dashboard:/proxy/` (Port forwarding has been enabled as part of `Vagrantfile`)

## Install Metrics server

```shell
$ kubectl apply -f https://github.com/kubernetes-sigs/metrics-server/releases/latest/download/components.yaml
```

**Notes:**

1. Tested on linux, mac, windows
2. Ansible will be installed inside the VM to keep compatibility on Windows; so no Ansible prerequisite on main host.
3. You can adjust the number of worker nodes by editing `NODES = 2` inside the Vagrantfile.


# References

There are many guides to deploy kubernetes using Vagrant and VirtualBox; if above solution is not working for you, you maye refer other references as well.

- [Kubernetes Setup Using Ansible and Vagrant](https://kubernetes.io/blog/2019/03/15/kubernetes-setup-using-ansible-and-vagrant/)
- [How To Create a Kubernetes Cluster Using Kubeadm on Ubuntu 18.04](https://www.digitalocean.com/community/tutorials/how-to-create-a-kubernetes-cluster-using-kubeadm-on-ubuntu-18-04)
- [How to Setup Kubernetes Cluster on Vagrant VMs](https://devopscube.com/kubernetes-cluster-vagrant/)
- [Container runtimes](https://kubernetes.io/docs/setup/production-environment/container-runtimes)
- [How to create a Kubernetes cluster with Kubeadm and Ansible on Ubuntu 20.04](https://www.arubacloud.com/tutorial/how-to-create-kubernetes-cluster-with-kubeadm-and-ansible-ubuntu-20-04.aspx)