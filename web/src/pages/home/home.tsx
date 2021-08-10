import {Button, Center, Flex, Td, Text, Tr} from "@chakra-ui/react";
import {useForm} from "react-hook-form";
import {Input} from "../../components/input/input";
import {TableComponent} from "../../components/table/table";
import React, { useEffect, useState } from 'react'
import {SocketService} from "../../socket";

type Account = {
    owner: string
    bank_name: string
    agency: string
    account: string
}

export const Home = () => {
    const {register, handleSubmit} = useForm()
    const [accounts, setAccounts] = useState<Account[]>([])

    const listener = (acc: Account) => {
        const account: Account = {
            owner: acc.owner,
            account: acc.account,
            agency: acc.agency,
            bank_name: acc.bank_name
        }
        setAccounts(prevState => [...prevState, account])
    }
    useEffect(() => {
        const socketService = new SocketService()
        socketService.listen("account", listener)
        return () => {
            socketService.disconnect()
        }
    }, [])

    const onSubmit = (data: any) => {
        fetch('http://api.kotlinproducer.localhost/users', {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then()
            .catch(er => console.log({er}))
    }
    return (
        <Center p={30} bg="gray.200" h="100vh" flexDir={"column"}>
            <Flex mb={5} flexDir="column">
                <Text fontSize="5xl">Create a user</Text>
                <Flex as="form" onSubmit={handleSubmit(onSubmit)} flexDir="column">
                    <Input placeholder="Name" register={register} name={"name"}/>
                    <Input placeholder="Email" name={"email"} register={register}/>
                    <Input type="password" placeholder={"Password"} name={"password"} register={register}/>
                    <Button type="submit" bg={"green.200"} _hover={{bgColor: 'green.500'}}>Save</Button>
                </Flex>
            </Flex>
            <Flex>
                <TableComponent>
                    {accounts.map(account => (
                        <Tr key={account.owner}>
                            <Td>{account.account}</Td>
                            <Td>{account.agency}</Td>
                            <Td>{account.owner}</Td>
                            <Td>{account.bank_name}</Td>
                        </Tr>
                    ))}

                </TableComponent>
            </Flex>
        </Center>
    );
}
