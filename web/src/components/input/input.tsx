import {Input as InputChakra} from "@chakra-ui/react";
import React from "react";

type InputProps = {
    name: string
    register: any
    placeholder: string
    type?: string
}

export const Input: React.FC<InputProps> = ({name, register, placeholder, type}) =>
    <InputChakra my={2} type={type} bg="white" placeholder={placeholder} {...register(name)} />
